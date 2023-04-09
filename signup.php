<?php
session_start();
require('config/app.php');

if (is_user_authenticated()) {
    redirect('contacts.php');
}

if (isset($_POST['signup'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    $errors = validate_signup_inputs($name, $email, $password);
    
    if (empty($errors)) {
        if (!is_user_exists($email)) {
            UserProvider::createUser($email, md5($password), $name);
            redirect("login.php");
        } else {
            $errors['signup'] = '<p class="text-center text-danger h1 fw-bold mb-5 mx-1 mx-md-4 pt-4">ئەم ئیمەیڵەی تۆ بەکارهێنەرێکی دیکەی هەیە</p>';
        }
    }
    
    $view_bag['errors'] = $errors;
}

view('signup');
