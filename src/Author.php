<?php
declare(strict_types = 1);

namespace App;

class Author{
    protected $authorID; // Primary key
    protected $description;
    protected $birthdate;
    protected $hometown;
    protected $first_name;
    protected $last_name;

    protected static $authorCount=0;

    public function __construct(string $description,string $birthdate,string $hometown,string $first_name,string $last_name){
        self::$authorCount++; // When create new author, increment

        $this->authorID = self::$authorCount;
        $this->description = $description;
        $this->birthdate = $birthdate;
        $this->first_name = $first_name;
        $this->last_name = $last_name;

    }

    public function getID() : int {
        return $this->authorID;
    }

    public function getDescription() : string{
        return $this->description;
    }

    public function getBirthdate() : string{
        return $this->birthdate;
    }

    public function getFullName() : string {
        return $this->first_name . " " . $this->last_name;
    }

    public function getFirstName() : string {
        return $this->first_name;
    }

    public function getLastName() : string {
        return $this->last_name;
    }
}

?>