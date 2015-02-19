<?php

namespace EthnoDoc\PublicationBundle\ElasticaRepository;

use FOS\ElasticaBundle\Repository;

/**
 *  ElasticaEditedMusicalNoteRepository
 *
 */
class ElasticaEditedMusicalNoteRepository extends Repository
{
    public function findTest($string)
    {
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
        $query = new \Elastica\Query\Filtered($query_part);

        return $this->findHybrid($query);
    }
}
