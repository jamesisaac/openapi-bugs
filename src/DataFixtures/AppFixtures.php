<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Book();
        $book1->isbn = '123';
        $book1->title = 'Animal Farm';
        $book1->description = 'Animal Farm is an allegorical novella by George Orwell, first published in England on 17 August 1945.';
        $book1->author = 'George Orwell';
        $book1->publicationDate = new \DateTime();
        $manager->persist($book1);

        $book2 = new Book();
        $book2->isbn = '456';
        $book2->title = 'The Hobbit';
        $book2->description = 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien.';
        $book2->author = 'J. R. R. Tolkein';
        $book2->publicationDate = new \DateTime();
        $manager->persist($book2);

        $review = new Review();
        $review->rating = 5;
        $review->body = 'A fantastic book';
        $review->author = 'G. Hampton';
        $review->publicationDate = new \DateTime();
        $review->book = $book1;
        $manager->persist($review);

        $review = new Review();
        $review->rating = 4;
        $review->body = 'Literary classic';
        $review->author = 'B. Smith';
        $review->publicationDate = new \DateTime();
        $review->book = $book1;
        $manager->persist($review);

        $review = new Review();
        $review->rating = 5;
        $review->body = 'Intriguing';
        $review->author = 'C. Jones';
        $review->publicationDate = new \DateTime();
        $review->book = $book1;
        $manager->persist($review);

        $review = new Review();
        $review->rating = 3;
        $review->body = 'Could be better';
        $review->author = 'W. Morgan';
        $review->publicationDate = new \DateTime();
        $review->book = $book2;
        $manager->persist($review);

        $review = new Review();
        $review->rating = 4;
        $review->body = 'Enjoyed but disappointed by the ending';
        $review->author = 'S. Maxwell';
        $review->publicationDate = new \DateTime();
        $review->book = $book2;
        $manager->persist($review);

        $manager->flush();
    }
}
