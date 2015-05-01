<?php
/**
 * Created by PhpStorm.
 * User: Anha
 * Date: 13/03/15
 * Time: 14:21
 */

namespace EthnoDoc\PublicationBundle\Services\Faceter;

use Elastica\Facet\Terms;

class Faceter {

    private $index;

    public function __construct(\FOS\ElasticaBundle\Elastica\Index $index)
    {
        $this->index = $index;
    }

    /**
     * @param $params
     * @return \Elastica\Filter\Bool
     */
    public function getFilter($params)
    {
        $filter =  new \Elastica\Filter\Bool();
        foreach($params as $key => $value) {
            $filter->addMust(new \Elastica\Filter\Terms($key, array($value)));
        }

        return $filter;
    }

    /**
     * @param $facetName
     * @param $filter
     * @return Terms
     */
    public function getFacet($facetName, $filter)
    {
        $facet = new \Elastica\Facet\Terms($facetName);
        $facet->setField($facetName)
            ->setAllTerms(false)
            ->setSize(5);
        $facet->setFilter($filter);

        return $facet;
    }

    /**
     * @param $selection
     * @return \Elastica\ResultSet
     */
    public function getFacetSelection($selection)
    {
        $results = null;
        $query_part = new \Elastica\Query\Bool();
        foreach($selection as $key => $value) {
            $query_part->addMust(
                new \Elastica\Query\Term(array(
                    $key => array('value' => $value),
                ))
            );
        }

        if(!empty($selection)){
            $results = $this->index->search($query_part);
        }

        return $results;
    }
} 