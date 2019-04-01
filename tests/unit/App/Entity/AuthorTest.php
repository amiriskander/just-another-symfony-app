<?php namespace App\Tests\App\Entity;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Common\Collections\ArrayCollection;

class AuthorTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {

    }

    protected function _after()
    {

    }

    // tests
    public function testSettersAndGetters()
    {
        $author = new Author();
        $author->setName('John Doe');
        $this->assertSame('John Doe', $author->getName(), 'Failed testing author name setter and getter methods');
    }

    /**
     * Test author books
     */
    public function testAuthorBooks()
    {
        $author = new Author();
        $book1  = new Book();
        $book2  = new Book();

        $author->addBook($book1);
        $author->addBook($book2);

        $authorBooks = $author->getBooks();
        $this->assertInstanceOf(ArrayCollection::class, $authorBooks);
        $this->assertEquals(2, $authorBooks->count());

        $author->removeBook($book1);
        $authorBooks = $author->getBooks();
        $this->assertInstanceOf(ArrayCollection::class, $authorBooks);
        $this->assertEquals(1, $authorBooks->count());
    }
}
