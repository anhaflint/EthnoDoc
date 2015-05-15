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
     * @ORM\Column(name="witness", type="string", length=255)
     */
    private $witness;

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
    private $usesCircumstance;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Expression", cascade={"persist"})
     */
    private $expressions;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
        $this->functionUses = new ArrayCollection();
        $this->usesCircumstance = new ArrayCollection();
        $this->expressions = new ArrayCollection();
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
     * @param UsesCircumstance|string $usesCircumstance
     * @return HandWrittenNote
     */
    public function addUsesCircumstance(UsesCircumstance $usesCircumstance)
    {
        $this->usesCircumstance[] = $usesCircumstance;

        return $this;
    }

    /**
     * remove uses circumstance
     *
     * @param UsesCircumstance $usesCircumstance
     */
    public function removeUsesCircumstance(UsesCircumstance $usesCircumstance)
    {
        $this->usesCircumstance->removeElement($usesCircumstance);
    }

    /**
     * Get usesCircumstance
     *
     * @return string
     */
    public function getUsesCircumstance()
    {
        return $this->usesCircumstance;
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
     * add expression
     *
     * @param string $expression
     * @return nonEditedMusicalNote
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
