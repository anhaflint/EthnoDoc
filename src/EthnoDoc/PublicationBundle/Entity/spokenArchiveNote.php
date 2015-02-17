<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * spokenArchiveNote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\spokenArchiveNoteRepository")
 */
class spokenArchiveNote extends Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="decade", type="string", length=255)
     */
    private $decade;

    /**
     * @var string
     *
     * @ORM\Column(name="witness", type="string", length=255)
     */
    private $witness;

    /**
     * @var string
     *
     * @ORM\Column(name="collector", type="string", length=255)
     */
    private $collector;

    /**
     * @var string
     *
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;

    /**
     * @var string
     *
     * @ORM\Column(name="stock", type="string", length=255)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="collection", type="string", length=255)
     */
    private $collection;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set decade
     *
     * @param string $decade
     * @return spokenArchiveNote
     */
    public function setDecade($decade)
    {
        $this->decade = $decade;

        return $this;
    }

    /**
     * Get decade
     *
     * @return string 
     */
    public function getDecade()
    {
        return $this->decade;
    }

    /**
     * Set witness
     *
     * @param string $witness
     * @return spokenArchiveNote
     */
    public function setWitness($witness)
    {
        $this->witness = $witness;

        return $this;
    }

    /**
     * Get witness
     *
     * @return string 
     */
    public function getWitness()
    {
        return $this->witness;
    }

    /**
     * Set collector
     *
     * @param string $collector
     * @return spokenArchiveNote
     */
    public function setCollector($collector)
    {
        $this->collector = $collector;

        return $this;
    }

    /**
     * Get collector
     *
     * @return string 
     */
    public function getCollector()
    {
        return $this->collector;
    }

    /**
     * Set survey
     *
     * @param string $survey
     * @return spokenArchiveNote
     */
    public function setSurvey($survey)
    {
        $this->survey = $survey;

        return $this;
    }

    /**
     * Get survey
     *
     * @return string 
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    /**
     * Set stock
     *
     * @param string $stock
     * @return spokenArchiveNote
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return string 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set collection
     *
     * @param string $collection
     * @return spokenArchiveNote
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return string 
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
