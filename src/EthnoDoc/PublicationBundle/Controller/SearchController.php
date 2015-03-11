<?php

namespace EthnoDoc\PublicationBundle\Controller;

use EthnoDoc\PublicationBundle\Entity\EditedMusicalNote;
use EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elastica\Facet\Terms;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        //Test facette
        $query = \Elastica\Query::create('');
            $country_facet = new Terms('country');
            $country_facet->setField('country');
            $query->addFacet($country_facet);

            $articles = $this->get('fos_elastica.index.ethnodoc')->search($query);
            $facets = $articles->getFacets();
            $countries = $facets['country']['terms'];

        $query = \Elastica\Query::create('');
            $artist_facet = new Terms('artist');
            $artist_facet->setField('artist');
            $query->addFacet($artist_facet);

            $articles = $this->get('fos_elastica.index.ethnodoc')->search($query);
            $facets = $articles->getFacets();
            $artists = $facets['artist']['terms'];

        $results = null;
        if($request->isMethod('get')){
            $index = $this->get('fos_elastica.index.ethnodoc');

            $artist = $request->query->get('artist');
            $genre = $request->query->get('genre');
            $country = $request->query->get('country');

            if(null !== $country) {
                $query_part = new \Elastica\Query\Bool();
                $query_part->addShould(
                    new \Elastica\Query\Term(array(
                        'country' => array('value' => $country),
                    ))
                );

                $results = $index->search($query_part);
            }

            if(null !== $artist) {
                $query_part = new \Elastica\Query\Bool();
                $query_part->addShould(
                    new \Elastica\Query\Term(array(
                        'artist' => array('value' => $artist),
                    ))
                );

                $results = $index->search($query_part);
            }
        }

        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
            'countries' => $countries,
            'artists' => $artists,
            'results' => $results,
        ));
    }

    public function printNoteAction($id, $type, Request $request) {
        //Facets
        $query = \Elastica\Query::create('');
            $country_facet = new Terms('country');
            $country_facet->setField('country');
            $query->addFacet($country_facet);

            $articles = $this->get('fos_elastica.index.ethnodoc')->search($query);
            $facets = $articles->getFacets();
            $countries = $facets['country']['terms'];

        $query = \Elastica\Query::create('');
            $artist_facet = new Terms('artist');
            $artist_facet->setField('artist');
            $query->addFacet($artist_facet);

            $articles = $this->get('fos_elastica.index.ethnodoc')->search($query);
            $facets = $articles->getFacets();
            $artists = $facets['artist']['terms'];

        //Result
        $index = $this->get('fos_elastica.index.ethnodoc');
            $query = new \Elastica\Query\Bool();
            $query->addMust(
                new \Elastica\Query\Term(array(
                    'id' => array('value' => $id),
                ))
            );
            $query->addMust(
                new \Elastica\Query\Term(array(
                    '_type' => array('value' => $type),
                ))
            );

        $result = $index->search($query)->getResults();

        return $this->render('EthnoDocPublicationBundle:Search:printNote.html.twig', array(
            'countries' => $countries,
            'artists' => $artists,
            'result' => $result[0]->getData(),
            'type' => $type
        ));
    }
}
