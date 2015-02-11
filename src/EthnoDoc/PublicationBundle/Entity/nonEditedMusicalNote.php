<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nonEditedMusicalNote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Entity\nonEditedMusicalNoteRepository")
 */
class nonEditedMusicalNote extends MusicalNote
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
     * @ORM\Column(name="witness", type="string", length=255)
     */
    private $witness;

    /**
     * @var string
     *
     * @ORM\Column(name="expression", type="string", length=255)
     */
    private $expression;

    /**
     * @var string
     *
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;

    /**
     * @var string
     *
     * @ORM\Column(name="collector", type="string", length=255)
     */
    private $collector;

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
     * Set witness
     *
     * @param string $witness
     * @return nonEditedMusicalNote
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
     * Set expression
     *
     * @param string $expression
     * @return nonEditedMusicalNote
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * Get expression
     *
     * @return string 
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * Set survey
     *
     * @param string $survey
     * @return nonEditedMusicalNote
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
     * Set collector
     *
     * @param string $collector
     * @return nonEditedMusicalNote
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
     * Set collection
     *
     * @param string $collection
     * @return nonEditedMusicalNote
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