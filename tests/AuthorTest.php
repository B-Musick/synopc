<?php
use \PHPUnit\Framework\TestCase;
use App\Author;

class AuthorTest extends TestCase
{
    protected $author1, $author2;

    protected function setUp() : void {
        $authorDescription = "This author is really bright and writes good books.";
        $authorDescription2 = "Cool author.";

        $this->author1 = new Author($authorDescription, "01/02/89","Stonewall", "marie", "antoinette");
        $this->author2 = new Author($authorDescription2, "04/03/77","Winnipeg", "billy", "citizen");
    }

    public function testGetAuthorID(){
        $this->assertEquals($this->author1->getID(),1);
        $this->assertEquals($this->author2->getID(),2);
    }

    public function testGetDescription(){
        $this->assertEquals($this->author1->getDescription(), "This author is really bright and writes good books.");
        $this->assertEquals($this->author2->getDescription(), "Cool author.");
    }

    public function testGetBirthdate(){
        $this->assertEquals($this->author1->getBirthdate(), "01/02/89");
        $this->assertEquals($this->author2->getBirthdate(), "04/03/77");
    }

    public function testGetFullName(){
        $this->assertEquals($this->author1->getFullName(), "marie antoinette");
        $this->assertEquals($this->author2->getFullName(), "billy citizen");
    }

    public function testGetFirstName(){
        $this->assertEquals($this->author1->getFirstName(), "marie");
        $this->assertEquals($this->author2->getFirstName(), "billy");
    }

    public function testGetLastName(){
        $this->assertEquals($this->author1->getLastName(), "antoinette");
        $this->assertEquals($this->author2->getLastName(), "citizen");
    }
}

?>