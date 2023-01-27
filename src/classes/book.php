<?php
declare(strict_types = 1);

class Book
{    
    protected $bookID, $isbn, $title, $publisher, $date;
    protected static $bookCount=0;

    public function __construct(int $isbn, string $title, string $publisher, string $date){
        self::$bookCount++; // Increment class variable to keep track of book count

        $this->bookID = self::$bookCount;
        $this->isbn = $isbn; // Primary key
        $this->title = $title;
        $this->publisher = $publisher;
        $this->date = $date;
    }

    public function getID() : int{
        return $this->bookID;
    }

    public function getISBN() : int{
        return $this->isbn;
    }

    public function getTitle() : string{
        return $this->title;
    }

    public function getPublisher() : string{
        return $this->publisher;
    }

    public function getDate() : string{
        return $this->date;
    }
}

?>