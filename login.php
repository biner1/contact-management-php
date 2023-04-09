<?php

session_start();
require('config/app.php');

if(is_user_authenticated()){
    redirect('contacts.php');
}


if (isset($_POST['login'])) {
    $emailLogin = htmlspecialchars($_POST['email']);
    $passwordLogin = htmlspecialchars($_POST['password']);
    $errors = validate_login_inputs($emailLogin, $passwordLogin);
    // $passwordLogin = md5($passwordLogin);

    if (empty($errors)) {
        $login = login($emailLogin,$passwordLogin);
        if($login['is_authenticated'] == true){
            redirect('contacts.php');
        }
         else {
            $errors['login'] = $login['error'];
        }
    }

    $view_bag['errors'] = $errors;
}



view('login');