<?php
// api/src/Entity/Book.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * A book.
 *
 * @ORM\Entity
 * @ApiResource(
 *  normalizationContext={"groups"={"Book:Default"}},
 *  collectionOperations={
 *      "get"={
 *          "normalization_context"={
 *              "groups"={
 *                  "Book:Collection"
 *              },
 *          },
 *      }
 *  }
 * )
 */
class Book
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"Book:Default", "Book:Collection"})
     */
    private $id;

    /**
     * @var string|null The ISBN of this book (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     * @Serializer\Groups({"Book:Default"})
     */
    public $isbn;

    /**
     * @var string The title of this book.
     *
     * @ORM\Column
     * @Serializer\Groups({"Book:Default", "Book:Collection"})
     */
    public $title;

    /**
     * @var string The description of this book.
     *
     * @ORM\Column(type="text")
     * @Serializer\Groups({"Book:Default"})
     */
    public $description;

    /**
     * @var string The author of this book.
     *
     * @ORM\Column
     * @Serializer\Groups({"Book:Default"})
     */
    public $author;

    /**
     * @var \DateTimeInterface The publication date of this book.
     *
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;

    /**
     * @var Review[] Available reviews for this book.
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="book", cascade={"persist", "remove"})
     * @ApiSubresource
     */
    public $reviews;
    
    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}