<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EditedMusicalNote
 *
 * @ORM\Table()
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
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="instrument", type="string", length=255)
     */
    private $instrument;

    /**
     * @var string
     *
     * @ORM\Column(name="phonogramTitle", type="string", length=255)
     */
    private $phonogramTitle;

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
     * Set artist
     *
     * @param string $artist
     * @return EditedMusicalNote
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string 
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set instrument
     *
     * @param string $instrument
     * @return EditedMusicalNote
     */
    public function setInstrument($instrument)
    {
        $this->instrument = $instrument;

        return $this;
    }

    /**
     * Get instrument
     *
     * @return string 
     */
    public function getInstrument()
    {
        return $this->instrument;
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
     * Set collection
     *
     * @param string $collection
     * @return EditedMusicalNote
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
