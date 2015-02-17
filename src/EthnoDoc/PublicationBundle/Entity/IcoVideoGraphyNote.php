<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcoVideoGraphyNote
 *
 * @ORM\Table()
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
     * Set collection
     *
     * @param string $collection
     * @return IcoVideoGraphyNote
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
}
