<?php
// api/src/Entity/Review.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * A review of a book.
 *
 * @ORM\Entity
 * @ApiResource(
 *  normalizationContext={"groups"={"Review:Default"}},
 *  subresourceOperations={
 *      "api_books_reviews_get_subresource"={
 *          "normalization_context"={
 *              "groups"={
 *                  "Review:Subresource"
 *              },
 *          },
 *      },
 *  },
 * )
 */
class Review
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"Review:Default", "Review:Subresource"})
     */
    private $id;

    /**
     * @var int The rating of this review (between 0 and 5).
     *
     * @ORM\Column(type="smallint")
     * @Serializer\Groups({"Review:Default", "Review:Subresource"})
     */
    public $rating;

    /**
     * @var string the body of the review.
     *
     * @ORM\Column(type="text")
     * @Serializer\Groups({"Review:Default"})
     */
    public $body;

    /**
     * @var string The author of the review.
     *
     * @ORM\Column
     * @Serializer\Groups({"Review:Default"})
     */
    public $author;

    /**
     * @var \DateTimeInterface The date of publication of this review.
     *
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;

    /**
     * @var Book The book this review is about.
     *
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="reviews")
     */
    public $book;

    public function getId(): ?int
    {
        return $this->id;
    }
}