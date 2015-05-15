<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EditedMusicalNote
 *
 * @ORM\Table(name="EditedMusicalNote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\EditedMusicalNoteRepository")
 */
class EditedMusicalNote extends MusicalNote
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
     * @ORM\Column(name="phonogramTitle", type="string", length=255)
     */
    private $phonogramTitle;

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
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Artist", cascade={"persist"})
     */
    private $artists;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
     */
    private $instruments;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
        $this->functionUses = new ArrayCollection();
        $this->usesCircumstances = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->artists = new ArrayCollection();
        $this->instruments = new ArrayCollection();
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
     * Set artist
     *
     * @param Artist $artist
     * @return EditedMusicalNote
     */
    public function addArtist(Artist $artist)
    {
        $this->artists[] = $artist;

        return $this;
    }

    public function removeArtist(Artist $artist)
    {
        $this->artists->removeElement($artist);
    }

    /**
     * Get artist
     *
     * @return string 
     */
    public function getArtist()
    {
        return $this->artists;
    }

    /**
     * add instruments
     *
     * @param Instrument $instrument
     * @return EditedMusicalNote
     */
    public function addInstrument(Instrument $instrument)
    {
        $this->instruments[] = $instrument;

        return $this;
    }

    /**
     * remove instrument
     *
     * @param Instrument $instrument
     */
    public function removeInstrument(Instrument $instrument)
    {
        $this->instruments->removeElement($instrument);
    }

    /**
     * Get instruments
     *
     * @return string 
     */
    public function getInstruments()
    {
        return $this->instruments;
    }

    /**
     * Set phonogramTitle
     *
     * @param string $phonogramTitle
     * @return EditedMusicalNote
     */
    public function setPhonogramTitle($phonogramTitle)
    {
        $this->phonogramTitle = $phonogramTitle;

        return $this;
    }

    /**
     * Get phonogramTitle
     *
     * @return string 
     */
    public function getPhonogramTitle()
    {
        return $this->phonogramTitle;
    }

    /**
     * Add collection
     *
     * @param Collection $collection
     * @return EditedMusicalNote
     */
    public function addCollection(Collection $collection)
    {
        $this->collections[] = $collection;

        return $this;
    }

    /**
     * Remove Collection
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
    public function getCollections()
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
