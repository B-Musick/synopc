<?php
declare(strict_types = 1);

class Author{
    protected $authorID; // Primary key
    protected $description;
    protected $birthdate;
    protected $hometown;
    protected $first_name;
    protected $last_name;

    public function __construct(int $authorID,string $description,string $birthdate,string $hometown,string $first_name,string $last_name){
        $this->authorID = $authorID;
    }

    public function getID(){
        return $this->authorID;
    }
}

?>