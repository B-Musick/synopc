<?php
use \PHPUnit\Framework\TestCase;
use App\Book;

class BookTests extends TestCase
{
    protected $book, $book2;

    /**
     * setUp()
     * - This is run before each function
     */
    protected function setUp() : void{
        $this->book = new Book(1, "Supernova Era", "Penguin", "01/01/01");
        $this->book2 = new Book(2102, "The Lost World", "Penguin", "01/02/02");
    }

    public function testCorrectIDReturned() : void {
        // Want to make sure the class variable increments for each book made
        $this->assertEquals($this->book->getID(), 1);
        $this->assertEquals($this->book2->getID(), 2);
    }

    public function testCorrectISBNReturned() : void {
        $this->assertEquals($this->book->getISBN(),1);
        $this->assertEquals($this->book2->getISBN(),2102);
    }

    public function testCorrectTitleReturned() : void {
        $this->assertEquals($this->book->getTitle(),"Supernova Era");
        $this->assertEquals($this->book2->getTitle(),"The Lost World");
    }

    public function testCorrectPublisherReturned() : void{
        $this->assertEquals($this->book->getPublisher(),"Penguin");
        $this->assertEquals($this->book2->getPublisher(),"Penguin");
    }

    public function testCorrectDate(){
        $this->assertEquals($this->book->getDate(),"01/01/01");
        $this->assertEquals($this->book2->getDate(),"01/02/02");
    }
}
?>