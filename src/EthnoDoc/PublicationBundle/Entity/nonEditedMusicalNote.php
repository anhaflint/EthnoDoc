<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NonEditedMusicalNote
 *
 * @ORM\Table(name="NonEditedMusicalNote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\NonEditedMusicalNoteRepository")
 */
class NonEditedMusicalNote extends MusicalNote
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
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Collector", cascade={"persist"})
     */
    private $collectors;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Collection", cascade={"persist"})
     */
    private $collections;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\FunctionUse", cascade={"persist"})
     */
    private $functionUses;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
     */
    private $keyWords;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\UsesCircumstance", cascade={"persist"})
     */
    private $usesCircumstances;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Expression", cascade={"persist"})
     */
    private $expressions;

    /**
     * @var string
     *
     * @ORM\Column(name="witnesses", type="string", length=255)
     */
    private $witnesses;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
        $this->functionUses = new ArrayCollection();
        $this->usesCircumstances = new ArrayCollection();
        $this->expressions = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->witnesses = new ArrayCollection();
        $this->collectors = new ArrayCollection();
    }

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
     * Set functionUses
     *
     * @param string $functionUses
     * @return HandWrittenNote
     */
    public function addFunctionUse($functionUses)
    {
        $this->functionUses[] = $functionUses;

        return $this;
    }

    public function removeFunctionUse($functionUse)
    {
        $this->functionUses->removeElement($functionUse);
    }

    /**
     * Get functionUses
     *
     * @return string
     */
    public function getFunctionUses()
    {
        return $this->functionUses;
    }

    /**
     * Set usesCircumstance
     *
     * @param UsesCircumstance $usesCircumstance
     * @return HandWrittenNote
     */
    public function addUsesCircumstance(UsesCircumstance $usesCircumstance)
    {
        $this->usesCircumstances[] = $usesCircumstance;

        return $this;
    }

    /**
     * remove uses circumstance
     *
     * @param UsesCircumstance $usesCircumstance
     */
    public function removeUsesCircumstance(UsesCircumstance $usesCircumstance)
    {
        $this->usesCircumstances->removeElement($usesCircumstance);
    }

    /**
     * Get usesCircumstance
     *
     * @return string
     */
    public function getUsesCircumstance()
    {
        return $this->usesCircumstances;
    }

    /**
     * add witness
     *
     * @param Witness $witness
     * @return NonEditedMusicalNote
     */
    public function addWitness(Witness $witness)
    {
        $this->witnesses[] = $witness;

        return $this;
    }

    /**
     * Remove witness
     *
     * @param Witness $witness
     */
    public function removeWitness(Witness $witness)
    {
        $this->witnesses->removeElement($witness);
    }

    /**
     * Get witnesses
     *
     * @return string 
     */
    public function getWitnesses()
    {
        return $this->witnesses;
    }

    /**
     * add expression
     *
     * @param Expression|string $expression
     * @return NonEditedMusicalNote
     */
    public function addExpression(Expression $expression)
    {
        $this->expressions[] = $expression;

        return $this;
    }


    /**
     * Remove expression from expressions
     *
     * @param Expression $expression
     */
    public function removeExpression(Expression $expression)
    {
        $this->expressions->removeElement($expression);
    }

    /**
     * Get expressions
     *
     * @return string 
     */
    public function getExpressions()
    {
        return $this->expressions;
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
     * add collector
     *
     * @param Collector $collector
     * @return nonEditedMusicalNote
     */
    public function addCollector(Collector $collector)
    {
        $this->collectors[] = $collector;

        return $this;
    }

    /**
     * Remove collector
     *
     * @param Collector $collector
     */
    public function removeCollector(Collector $collector)
    {
        $this->collectors->removeElement($collector);
    }

    /**
     * Get collector
     *
     * @return string 
     */
    public function getCollector()
    {
        return $this->collectors;
    }

    /**
     * Add a collection to the collection list
     *
     * @param Collection $collection
     * @return $this
     */
    public function addCollection(Collection $collection)
    {
        $this->collections[] = $collection;

        return $this;
    }

    /**
     * Remove collection from collection list
     *
     * @param Collection $collection
     */
    public function removeCollection(Collection $collection)
    {
        $this->collections->removeElement($collection);
    }

    /**
     * Get collection
     *
     * @return string 
     */
    public function getCollection()
    {
        return $this->collections;
    }

    /**
     * add keyWord
     *
     * @param KeyWord $keyWord
     * @internal param string $keyWords
     * @return Note
     */
    public function addKeyWords(KeyWord $keyWord)
    {
        $this->keyWords[] = $keyWord;

        return $this;
    }

    /**
     * Remove keyword from keywords list
     *
     * @param KeyWord $keyWord
     */
    public function removeKeyWord(KeyWord $keyWord)
    {
        $this->keyWords->removeElement($keyWord);
    }

    /**
     * Get all the keywords of a note
     *
     * @return string
     */
    public function getKeyWords()
    {
        return $this->keyWords;
    }
}
