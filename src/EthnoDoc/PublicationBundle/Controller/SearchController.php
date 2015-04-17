<?php

namespace EthnoDoc\PublicationBundle\Controller;

use EthnoDoc\PublicationBundle\Entity\EditedMusicalNote;
use EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elastica\Facet\Terms;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function searchAction($id, $type, Request $request)
    {
        $faceter = $this->container->get('ethno_doc_publication.faceter');
        $index = $this->get('fos_elastica.index.ethnodoc');
        $results = null;
        $notice = null;

        if($request->isMethod('get')){
            $selected = $request->query->all();

            //Global Query
            $query = new \Elastica\Query();
            //Terms Filter
            $filter = $faceter->getFilter($selected);
            //Facet Creation
            $query->addFacet($faceter->getFacet('country', $filter));
            $query->addFacet($faceter->getFacet('artist', $filter));
            $query->addFacet($faceter->getFacet('instrument', $filter));
            $query->addFacet($faceter->getFacet('culture', $filter));

            $search = $index->search($query);
            $facets = $search->getFacets();

            //Build Query
            $results = $faceter->getFacetSelection($selected);
        }

        if($id !== null && $type !== null) {
            $notice = $faceter->getFacetSelection(array('id' => $id, '_type' => $type))->getResults();

            return $this->render('EthnoDocPublicationBundle:Search:printNote.html.twig', array(
                'results' => $results,
                'facets' => $facets,
                'notice' => $notice[0]->getData(),
                'type' => $type
            ));
        }

        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
            'results' => $results,
            'facets' => $facets,
        ));
    }

    public function autocompleteAction($searchPhrase)
    {
        $index = $this->container->get('fos_elastica.index.ethnodoc');
        if(null !== $searchPhrase) {
            $finder = $this->container->get('fos_elastica.finder.ethnodoc');
            $results = $index->search('*'.$searchPhrase.'*', 5)->getResults();
            $names = [];

            foreach($results as $key => $result) {
                $names[$key]['title'] =  $result->getData()['title'];
                $names[$key]['id'] = $result->getData()['id'];
                $names[$key]['type'] = $result->getType();
                $hit = null;
                foreach($result->getData() as  $data) {
                    if(stripos($data, $searchPhrase)!== false) {
                        $hit = $data;
                    }
                }
                $names[$key]['hit'] = $hit;
            }

            return new Response(json_encode($names));
        }
        return null;
    }

}
