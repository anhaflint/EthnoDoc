<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SpokenArchiveNote
 *
 * @ORM\Table(name="SpokenArchiveNote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\SpokenArchiveNoteRepository")
 */
class SpokenArchiveNote extends Note
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
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Witness", cascade={"persist"})
     */
    private $witnesses;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Collector", cascade={"persist"})
     */
    private $collectors;

    /**
     * @var string
     *
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Stock", cascade={"persist"})
     */
    private $stocks;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Collection", cascade={"persist"})
     */
    private $collections;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
     */
    private $keyWords;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->witnesses = new ArrayCollection();
        $this->collectors = new ArrayCollection();
        $this->stocks = new ArrayCollection();
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
     * Add stock
     *
     * @param Stock $stock
     * @return spokenArchiveNote
     */
    public function addStock(Stock $stock)
    {
        $this->stocks[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param Stock $stock
     */
    public function removeStock(Stock $stock)
    {
        $this->stocks->removeElement($stock);
    }

    /**
     * Get stock
     *
     * @return string 
     */
    public function getStock()
    {
        return $this->stocks;
    }

    /**
     * Add collection
     *
     * @param Collection $collection
     * @return SpokenArchiveNote
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
     * Get collections
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
