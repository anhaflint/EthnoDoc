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
     * Returns a filter given the user's selection
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
     * Returns the facet filtered by $filter corresponding to the given field name $facetName
     * @param $facetName
     * @param $filter
     * @return Terms
     */
    public function getFacet($facetName, $filter)
    {
        $facet = new \Elastica\Facet\Terms($facetName);
        $facet->setField($facetName)
            ->setAllTerms(false)
            ->setSize(5000);
        $facet->setFilter($filter);

        return $facet;
    }

    /**
     * Returns the facets collection in array $facetFields given the $filter Bool filter
     * @param array $facetFields
     * @param \Elastica\Filter\Bool $filter
     * @return array
     */
    public function getFacetCollection(array $facetFields, \Elastica\Filter\Bool $filter)
    {
        //New query
        $query = new \Elastica\Query();

        //Add facets to query
        foreach($facetFields as $key => $facetField) {
            $query->addFacet($this->getFacet($facetField, $filter));
        }

        $search = $this->index->search($query);

        //get facets
        return $search->getFacets();
    }

    /**
     * Returns the result of user's selection
     * @param $selection
     * @param $page
     * @return \Elastica\ResultSet
     */
    public function getFacetSelection($selection, $page)
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
            $results = $this->index->search($query_part, array('from' => ($page-1)*10));
        }

        return $results;
    }
} 