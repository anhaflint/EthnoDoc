<?php

namespace EthnoDoc\PublicationBundle\Controller;

use EthnoDoc\PublicationBundle\Entity\EditedMusicalNote;
use EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote;
use EthnoDoc\PublicationBundle\Entity\KeyWord;
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
        foreach($selected as $key => $select) {
            $selected[$key] = str_replace('_', ' ', $selected[$key]);
        }

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
            array('_type', 'locality', 'culture', 'title', 'decade'), $faceter->getFilter($selected)
        );

        //Build Query
        $results = $faceter->getFacetSelection($selected, $page);



        //Display selected note on user's selection
        if( null !== $id && null !== $type) {
            $notice = $faceter->getFacetSelection(array('id' => $id, '_type' => $type), 1)->getResults();
            return $this->render('EthnoDocPublicationBundle:Search:printNote.html.twig', array(
                'selected' => $selected,
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
            $searchPhrase = $form->getData()['search'];
            $searchPhrase = explode(' ', $searchPhrase);
            $results = [];
            $count = 0;
            foreach($searchPhrase as $key => $word) {
                $res = $index->search('*'.$word.'*', 20)->getResults();
                foreach($res as $resKey => $resValue) {
                    $results[] = $resValue;
                }
                $count += count($res);
            }
            $results['totalHits'] = $count;
        }

        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
            'selected' => $selected,
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
                    if(!is_array($data) and stripos($data, $searchPhrase)!== false) {
                        $hit = $data;
                    } elseif(is_array($data)) {
                        foreach($data as $key => $value) {
                            $hit = (stripos($value, $searchPhrase) !== false) ? $value : null;
                        }
                    }
                }
                $names[$key]['hit'] = $hit;
            }

            return new Response(json_encode($names));
        }
        return null;
    }

}
