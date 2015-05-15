<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IcoVideoGraphyNote
 *
 * @ORM\Table(name="IcoVideoGraphyNote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\IcoVideoGraphyNoteRepository")
 */
class IcoVideoGraphyNote extends Note
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
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="publisherNumber", type="string", length=255)
     */
    private $publisherNumber;

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
     * Set decade
     *
     * @param string $decade
     * @return IcoVideoGraphyNote
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
     * Set publisher
     *
     * @param string $publisher
     * @return IcoVideoGraphyNote
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set publisherNumber
     *
     * @param string $publisherNumber
     * @return IcoVideoGraphyNote
     */
    public function setPublisherNumber($publisherNumber)
    {
        $this->publisherNumber = $publisherNumber;

        return $this;
    }

    /**
     * Get publisherNumber
     *
     * @return string 
     */
    public function getPublisherNumber()
    {
        return $this->publisherNumber;
    }

    /**
     * Set survey
     *
     * @param string $survey
     * @return IcoVideoGraphyNote
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
     * @return IcoVideoGraphyNote
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
