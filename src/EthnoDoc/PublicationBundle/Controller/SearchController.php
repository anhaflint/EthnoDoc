<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    public function searchAction()
    {

        $editedNoteType = $this->get('fos_elastica.index.ethnodoc.editedmusicalnote');
        $result = $editedNoteType->search("country8");


        $query_part = new \Elastica\Query\Bool();
        $query_part->addShould(
            new \Elastica\Query\Term(
                array('title' => array('value' => 'title1', 'boost' => 3))
            )
        );

        $query_part->addShould(
            new \Elastica\Query\Term(
                array('country' => array('value' => 'country6'))
            )
        );

        $filters = new \Elastica\Filter\Bool();
        $filters->addShould(
            new \Elastica\Filter\Term(
                array('keyWords' => 'keyWords1')
            )
        );

        $query = new \Elastica\Query\Filtered($query_part, $filters);

        $result = $editedNoteType->search($query);

        $finder = $this->get('fos_elastica.finder.ethnodoc.editedmusicalnote');
        $notes = $finder->findHybrid('country8', 20);
        dump($notes);die;
        dump($result);die;
        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
                // ...
            ));    }

}
