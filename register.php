<?php
    declare(strict_types=1);
    require 'includes/validate.php';
  
    // Initialize $user array
    $user_input = [
        'first_name'  => '',
        'last_name' => '',
        'email' => '',
        'age'   => '',
        'password' => '',
        'agreement' => '', // Will hold whether user checked box to agree
    ];                        

    // Initialize errors array
    $error_msg = [
        'first_name'  => '',
        'last_name' => '',
        'email' => '',
        'age'   => '',
        'password' => '',
        'agreement' => '',
    ];                                                            

    $message = ''; // Initialize message

    // Validating Form data
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // 1. Check that a form has been submitted with POST request
        $user_input['age'] = $_POST['age'];
        $user_input['first_name'] = $_POST['first_name'];
        $user_input['last_name'] = $_POST['last_name'];
        $user_input['email'] = $_POST['email']; 
        $user_input['password'] = $_POST['password'];
        $user_input['agreement'] = (isset($_POST['agreement']) && $_POST['agreement']==true) ? true : false;

        // 2. Determine if input is correct or need to use error message
        $error_msg['age'] = is_valid_age($user_input['age'], 0, 140) ? '' : "Age is not valid";
        $error_msg['first_name'] = is_valid_text($user_input['first_name']) ? "" : "First name is not valid";
        $error_msg['last_name'] = is_valid_text($user_input['last_name']) ? "" : "Last name is not valid";
        $error_msg['email'] = is_valid_email($user_input['email']) ? "" : "Email is not valid"; 
        $error_msg['password'] = is_valid_password($user_input['password']) ? "" : "Password is not valid";
        $error_msg['agreement'] = $user_input['agreement'] ? '' : 'You must agree to the terms';

        // 3. Imploed the error messages so array only contains keys with an error msg
        $invalid_vars = implode($error_msg);

        if($invalid_vars){
            // Dont process form and display errors
            $message = 'Please correct the following errors:';    // Do not process

        }else{
            // Data valid, process data
            $message = 'Your data was valid';                     // Can process data
        }
    }
?>

<?php include 'includes/header.php'; ?>
    <div class="form-container">
        <form action="./register.php" method="POST">
            <div class="form-input">
                <p>first name: <input type="text" name="first_name" value="<?= htmlspecialchars($user_input['first_name']) ?>"> </p>
                <span class="error"><?= $error_msg['first_name'] ?></span><br>
            </div>

            <div class="form-input">
                <p>last name:      <input type="text" name="last_name" value="<?= htmlspecialchars($user_input['last_name']) ?>"></p>
                <span class="error"><?= $error_msg['last_name'] ?></span><br>
            </div>

            <div class="form-input">
                <p>email:    <input type="text" name="email" value="<?= htmlspecialchars($user_input['email'])?>"></p>
                <span class="error"><?= $error_msg['email'] ?></span><br>
            </div>

            <div class="form-input">
                <p>age:    <input type="text" name="age" value="<?=htmlspecialchars($user_input['age'])?>"></p>
                <span class="error"><?= $error_msg['age'] ?></span><br>
            </div>

            <div class="form-input">
                <p>password: <input type="password" name="password" value="<?= htmlspecialchars($user_input['password'])?>"></p>
                <span class="error"><?= $error_msg['password'] ?></span><br>
            </div>

            <div class="form-input">
                <p><input type="checkbox" name="agreement" value="true" <?= $agreement ? 'checked':''?> > 
                I agree to the terms and conditions.</p>
                <span class="error"><?= $error_msg['agreement'] ?></span><br>
            </div>

            <button>submit</button>
        </form>
    </div>
<?php include 'includes/footer.php'; ?>
