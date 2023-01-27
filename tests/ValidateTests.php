<?php
    
require 'includes/validate.php';

class ValidateTests extends \PHPUnit\Framework\TestCase {
    /**
     * @test
     * - Tell php these are tests with the keyword above, or write 'test' before each test
     */
    public function testIsValidAge(){
        $valid_age = 10;
        $invalid_age = -1;
        $no_age = 0;

        $this->assertTrue(is_valid_age($valid_age));
        $this->assertFalse(is_valid_age($invalid_age));
        $this->assertFalse(is_valid_age($no_age));
    }

    /**
     * @test testIsValidText(string, min, max)
     * The default values for min = 1, max = 100
     */
    public function testIsValidText(){
        $valid_string = "Brendan";
        $empty_string = "";
        $too_long = "abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz";

        $this->assertTrue(is_valid_text($valid_string));
        $this->assertFalse(is_valid_text($empty_string));
        $this->assertFalse(is_valid_text($too_long));
    }

    /**
     * @test testIsValidEmail
     * Testing is_valid_email(string email)
     * - Email should have a username
     * - An @ symbol
     * - A valid domain name
     */
    public function testIsValidEmail(){
        $valid_email = "brendan_01@gmail.com";
        $invalid_at_symbol = "brendan_01gmail.com";
        $invalid_period = "brendan_01@gmailcom";
        $invalid_username = "@gmail.com";
        $invalid_username_char = "_@gmail.com";

        $this->assertTrue(is_valid_email($valid_email));
        $this->assertFalse(is_valid_email($invalid_at_symbol));
        $this->assertFalse(is_valid_email($invalid_period));
        $this->assertFalse(is_valid_email($invalid_username));
        $this->assertFalse(is_valid_email($invalid_username_char));
    }

    /** @test 
     * Tests to make sure validation of password works. Password should consist of:
     *  - At least 8 letters
     *  - At least one special character
     *  - At least one uppercase and one lowercase letter
     *  - At least one number
    */
    public function password_properly_validated(){
        $valid_password = "dsljdfF13H?";
        $missing_lowercase = "HGIDS323^";
        $missing_uppercase = "hg21sa^3";
        $missing_character = "chgai4H4";
        $missing_number = "chgaihdHH^";
        $too_short = "3es^J";
        $empty_string = "";

        $this->assertTrue(is_valid_password($valid_password));
        $this->assertFalse(is_valid_password($missing_lowercase));
        $this->assertFalse(is_valid_password($missing_uppercase));
        $this->assertFalse(is_valid_password($missing_character));
        $this->assertFalse(is_valid_password($missing_number));
        $this->assertFalse(is_valid_password($too_short));
        $this->assertFalse(is_valid_password($empty_string));
    }
}
?>