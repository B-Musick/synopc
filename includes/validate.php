<?php
    // Record which variables are invalid, use array since may have multiple
    function is_valid_age($age, int $min=0, int $max=130):bool{
        return is_numeric($age) and $age > $min and $age < $max;
    }

    function is_valid_text($text, int $min_length = 1, int $max_length = 100) : bool{
        return mb_strlen($text) > $min_length and mb_strlen($text) < $max_length;
    }

    function is_valid_email($email) : bool {
        // Email should have a form of 'domain@email.com'
        return 
            preg_match('/[a-zA-Z0-9]+\@[a-zA-Z0-9]+\.[a-zA-Z]/', $email);
    }

    function is_valid_password(string $password): bool{
        return
            mb_strlen($password) >= 8
            && preg_match('/[A-Z]/', $password) // Make sure contains capital
            && preg_match('/[a-z]/', $password) // Contains lowercase
            && preg_match('/[0-9]/', $password) // Contains number
            && preg_match('/[\\\?\/\(\)\.\|\^\$\+\*]/', $password); // Contains special char
    }
?>