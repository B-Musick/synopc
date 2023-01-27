<?php
use \PHPUnit\Framework\TestCase;

class BookTests extends TestCase
{
    public function testCorrectISBNReturned(){
        require './src/classes/Book.php';

        $book = new Book(1, "Supernova Era", "Penguin", "01/01/01");
        $book2 = new Book(2102, "The Lost World", "Penguin", "01/02/02");

        $this->assertEquals($book->getID(), 1);
        $this->assertEquals($book->getISBN(),1);
        $this->assertEquals($book->getTitle(),"Supernova Era");
        $this->assertEquals($book->getPublisher(),"Penguin");
        $this->assertEquals($book->getDate(),"01/01/01");

        // Want to make sure the class variable increments for each book made
        $this->assertEquals($book2->getID(), 2);
    }
}
?>