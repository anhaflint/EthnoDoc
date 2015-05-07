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
    public function searchAction($page, $id, $type, Request $request)
    {
        $faceter = $this->container->get('ethno_doc_publication.faceter');
        $index = $this->get('fos_elastica.index.ethnodoc');
        $selected = $request->query->all();
        $results = null;
        $notice = null;
        $data = array();

        // Form creation
        $form = $this->createFormBuilder($data)
            ->add('search', 'text')
            ->add('Rechercher', 'submit')
            ->getForm();

        //get facet collection according to user's selection
        $facets = $faceter->getFacetCollection(
            array('country', '_type', 'culture', 'title'), $faceter->getFilter($selected)
        );

        //Build Query
        $results = $faceter->getFacetSelection($selected, $page);



        //Display selected note on user's selection
        if( null !== $id && null !== $type) {
            $notice = $faceter->getFacetSelection(array('id' => $id, '_type' => $type), 1)->getResults();
            return $this->render('EthnoDocPublicationBundle:Search:printNote.html.twig', array(
                'results' => $results,
                'facets' => $facets,
                'notice' => $notice[0]->getData(),
                'type' => $type,
                'page' => $page,
                'form' => $form->createView()
            ));
        }

        //Display textual search results
        if($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            $data = $form->getData()['search'];
            $results = $index->search('*'.$data.'*', 20)->getResults();
        }

        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
            'results' => $results,
            'facets' => $facets,
            'page' => $page,
            'form' => $form->createView()
        ));
    }

    public function autocompleteAction($searchPhrase)
    {
        $index = $this->container->get('fos_elastica.index.ethnodoc');
        if(null !== $searchPhrase) {
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
