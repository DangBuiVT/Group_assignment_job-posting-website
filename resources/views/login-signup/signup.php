<?php 
    include "config/db.php";

    $fname = $lname = $comp = $email = $pw = '';

    $errs = ['fname'=>'','lname'=>'','comp'=>'', 'email'=>'', 'pw'=>''];

    if (isset($_POST['submit'])){
        if (empty($_POST['first-name'])){
            $errs['fname'] = 'Field \'First name\' is empty';
        } else {
            $fname = $_POST['first-name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
                $errs['fname'] =  'Names must only contain letters and spaces';
            }
        }

        if (empty($_POST['last-name'])){
            $errs['lname'] = 'Field \'Last name\' is empty';
        } else {
            $lname = $_POST['last-name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
                $errs['lname'] =  'Names must only contain letters and spaces';
            }
        }

        if (empty($_POST['company'])){
            $errs['comp'] = 'Field \'Company\' is empty';
        } else {
            $comp = $_POST['company'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $comp)){
                $errs['comp'] =  'Names must only contain letters and spaces';
            }
        }

        if (empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        } else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] =  'Email must be a valid email address';
            }
        }

        if (empty($_POST['password'])){
            $errs['comp'] = 'Field \'Company\' is empty';
        } else {
            $comp = $_POST['company'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $comp)){
                $errs['comp'] =  'Names must only contain letters and spaces';
            }
        }
    }
?>


<form action="" method="POST" class="signup-box">
    <h1 class="signup-title">Register as Employer</h1>
    <div class="input-group name">
        <div class="first-name-input">
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name">
        </div>
        <div class="last-name-input">
            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name">
        </div>
    </div>
    <div class="input-group">
        <label for="company-name">Company:</label>
        <input type="text" id="company-name" name="company">
    </div>
    <div class="input-group">
        <label for="email-address">Email:</label>
        <input type="email" id="email-address" name="email">
    </div>
    <div class="password-group">
        <div class="input-group">
            <label for="user-password">Password:</label>
            <input type="password" id="user-password" name="password">
        </div>
        <div class="input-group">
            <label for="confirm-password">Comfirm password:</label>
            <input type="password" id="confirm-password" name="password">
        </div>
    </div>
    
    <input type="submit" name="submit" class="submit-btn">Submit</input>
</form>