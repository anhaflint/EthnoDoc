<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * HandWrittenNote
 *
 * @ORM\Table(name="HandWrittenNote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\HandWrittenNoteRepository")
 */
class HandWrittenNote extends Note
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
     * @ORM\Column(name="leadInCoupletFR", type="string", length=255)
     */
    private $leadInCoupletFR;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInRefrainFR", type="string", length=255)
     */
    private $leadInRefrainFR;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInCoupletVO", type="string", length=255)
     */
    private $leadInCoupletVO;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInRefrainVO", type="string", length=255)
     */
    private $leadInRefrainVO;

    /**
     * @var string
     *
     * @ORM\Column(name="authorAncient", type="string", length=255)
     */
    private $authorAncient;

    /**
     * @var string
     *
     * @ORM\Column(name="traditionalAuthor", type="string", length=255)
     */
    private $traditionalAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="publisherAncient", type="string", length=255)
     */
    private $publisherAncient;

    /**
     * @var string
     *
     * @ORM\Column(name="traditionalPublisher", type="string", length=255)
     */
    private $traditionalPublisher;

    /**
     * @var string
     *
     * @ORM\Column(name="culture", type="string", length=255)
     */
    private $culture;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="usesCircumstance", type="string", length=255)
     */
    private $usesCircumstance;

    /**
     * @var string
     *
     * @ORM\Column(name="functionUses", type="string", length=255)
     */
    private $functionUses;

    /**
     * @var string
     *
     * @ORM\Column(name="coiraultTheme", type="string", length=255)
     */
    private $coiraultTheme;

    /**
     * @var string
     *
     * @ORM\Column(name="coiraultNumber", type="string", length=255)
     */
    private $coiraultNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="laforteNumber", type="string", length=255)
     */
    private $laforteNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="precotationEthnodoc", type="string", length=255)
     */
    private $precotationEthnodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="postCardPublisher", type="string", length=255)
     */
    private $postCardPublisher;

    /**
     * @var string
     *
     * @ORM\Column(name="postCardPublisherNumber", type="string", length=255)
     */
    private $postCardPublisherNumber;

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
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
     */
    private $keyWords;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
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
     * Set leadInCoupletFR
     *
     * @param string $leadInCoupletFR
     * @return HandWrittenNote
     */
    public function setLeadInCoupletFR($leadInCoupletFR)
    {
        $this->leadInCoupletFR = $leadInCoupletFR;

        return $this;
    }

    /**
     * Get leadInCoupletFR
     *
     * @return string 
     */
    public function getLeadInCoupletFR()
    {
        return $this->leadInCoupletFR;
    }

    /**
     * Set leadInRefrainFR
     *
     * @param string $leadInRefrainFR
     * @return HandWrittenNote
     */
    public function setLeadInRefrainFR($leadInRefrainFR)
    {
        $this->leadInRefrainFR = $leadInRefrainFR;

        return $this;
    }

    /**
     * Get leadInRefrainFR
     *
     * @return string 
     */
    public function getLeadInRefrainFR()
    {
        return $this->leadInRefrainFR;
    }

    /**
     * Set leadInCoupletVO
     *
     * @param string $leadInCoupletVO
     * @return HandWrittenNote
     */
    public function setLeadInCoupletVO($leadInCoupletVO)
    {
        $this->leadInCoupletVO = $leadInCoupletVO;

        return $this;
    }

    /**
     * Get leadInCoupletVO
     *
     * @return string 
     */
    public function getLeadInCoupletVO()
    {
        return $this->leadInCoupletVO;
    }

    /**
     * Set leadInRefrainVO
     *
     * @param string $leadInRefrainVO
     * @return HandWrittenNote
     */
    public function setLeadInRefrainVO($leadInRefrainVO)
    {
        $this->leadInRefrainVO = $leadInRefrainVO;

        return $this;
    }

    /**
     * Get leadInRefrainVO
     *
     * @return string 
     */
    public function getLeadInRefrainVO()
    {
        return $this->leadInRefrainVO;
    }

    /**
     * Set authorAncient
     *
     * @param string $authorAncient
     * @return HandWrittenNote
     */
    public function setAuthorAncient($authorAncient)
    {
        $this->authorAncient = $authorAncient;

        return $this;
    }

    /**
     * Get authorAncient
     *
     * @return string 
     */
    public function getAuthorAncient()
    {
        return $this->authorAncient;
    }

    /**
     * Set traditionalAuthor
     *
     * @param string $traditionalAuthor
     * @return HandWrittenNote
     */
    public function setTraditionalAuthor($traditionalAuthor)
    {
        $this->traditionalAuthor = $traditionalAuthor;

        return $this;
    }

    /**
     * Get traditionalAuthor
     *
     * @return string 
     */
    public function getTraditionalAuthor()
    {
        return $this->traditionalAuthor;
    }

    /**
     * Set publisherAncient
     *
     * @param string $publisherAncient
     * @return HandWrittenNote
     */
    public function setPublisherAncient($publisherAncient)
    {
        $this->publisherAncient = $publisherAncient;

        return $this;
    }

    /**
     * Get publisherAncient
     *
     * @return string 
     */
    public function getPublisherAncient()
    {
        return $this->publisherAncient;
    }

    /**
     * Set traditionalPublisher
     *
     * @param string $traditionalPublisher
     * @return HandWrittenNote
     */
    public function setTraditionalPublisher($traditionalPublisher)
    {
        $this->traditionalPublisher = $traditionalPublisher;

        return $this;
    }

    /**
     * Get traditionalPublisher
     *
     * @return string 
     */
    public function getTraditionalPublisher()
    {
        return $this->traditionalPublisher;
    }

    /**
     * Set culture
     *
     * @param string $culture
     * @return HandWrittenNote
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get culture
     *
     * @return string 
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return HandWrittenNote
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set usesCircumstance
     *
     * @param string $usesCircumstance
     * @return HandWrittenNote
     */
    public function setUsesCircumstance($usesCircumstance)
    {
        $this->usesCircumstance = $usesCircumstance;

        return $this;
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
     * Set functionUses
     *
     * @param string $functionUses
     * @return HandWrittenNote
     */
    public function setFunctionUses($functionUses)
    {
        $this->functionUses = $functionUses;

        return $this;
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
     * Set coiraultTheme
     *
     * @param string $coiraultTheme
     * @return HandWrittenNote
     */
    public function setCoiraultTheme($coiraultTheme)
    {
        $this->coiraultTheme = $coiraultTheme;

        return $this;
    }

    /**
     * Get coiraultTheme
     *
     * @return string 
     */
    public function getCoiraultTheme()
    {
        return $this->coiraultTheme;
    }

    /**
     * Set coiraultNumber
     *
     * @param string $coiraultNumber
     * @return HandWrittenNote
     */
    public function setCoiraultNumber($coiraultNumber)
    {
        $this->coiraultNumber = $coiraultNumber;

        return $this;
    }

    /**
     * Get coiraultNumber
     *
     * @return string 
     */
    public function getCoiraultNumber()
    {
        return $this->coiraultNumber;
    }

    /**
     * Set laforteNumber
     *
     * @param string $laforteNumber
     * @return HandWrittenNote
     */
    public function setLaforteNumber($laforteNumber)
    {
        $this->laforteNumber = $laforteNumber;

        return $this;
    }

    /**
     * Get laforteNumber
     *
     * @return string 
     */
    public function getLaforteNumber()
    {
        return $this->laforteNumber;
    }

    /**
     * Set precotationEthnodoc
     *
     * @param string $precotationEthnodoc
     * @return HandWrittenNote
     */
    public function setPrecotationEthnodoc($precotationEthnodoc)
    {
        $this->precotationEthnodoc = $precotationEthnodoc;

        return $this;
    }

    /**
     * Get precotationEthnodoc
     *
     * @return string 
     */
    public function getPrecotationEthnodoc()
    {
        return $this->precotationEthnodoc;
    }

    /**
     * Set postCardPublisher
     *
     * @param string $postCardPublisher
     * @return HandWrittenNote
     */
    public function setPostCardPublisher($postCardPublisher)
    {
        $this->postCardPublisher = $postCardPublisher;

        return $this;
    }

    /**
     * Get postCardPublisher
     *
     * @return string 
     */
    public function getPostCardPublisher()
    {
        return $this->postCardPublisher;
    }

    /**
     * Set postCardPublisherNumber
     *
     * @param string $postCardPublisherNumber
     * @return HandWrittenNote
     */
    public function setPostCardPublisherNumber($postCardPublisherNumber)
    {
        $this->postCardPublisherNumber = $postCardPublisherNumber;

        return $this;
    }

    /**
     * Get postCardPublisherNumber
     *
     * @return string 
     */
    public function getPostCardPublisherNumber()
    {
        return $this->postCardPublisherNumber;
    }

    /**
     * Set witness
     *
     * @param string $witness
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
