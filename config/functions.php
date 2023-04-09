<?php

function redirect($url){
    header("Location: $url");
    die();
}

function view($name,$model = ''){
    global $view_bag;
    require(APP_PATH . "views/layout.view.php");
}

function is_post(){
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_get(){
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function sanitize($value){
    $temp = filter_var(trim($value),FILTER_SANITIZE_STRING);

    if($temp === false){
        return '';
    }

    return $temp;
}

function is_user_authenticated(){
    return isset($_SESSION['id']);
}

function ensure_user_is_authenticated(){
    if(!is_user_authenticated()){
        redirect('login.php');
    }
}

function authenticate_user($email,$password){
    $user = UserProvider::getUser($email,$password);
    return !empty($user);
}


function get_logged_in_user(){
    return $_SESSION['id'];
}

function is_user_exists($email){
    $user = UserProvider::getUserByEmail($email);
    return !empty($user);
}

function getUser($email, $password)
{
    $user = UserProvider::getUser($email, $password);
    return $user;
}

function getUserId($email)
{
    $user = UserProvider::getUserByEmail($email);
    return $user[0]['id'];
}

function createContact($name, $email, $phone, $user_id)
{
    UserProvider::createContact($name, $email, $phone,  $user_id);
}

function editContact($id, $name, $email, $phone)
{
    UserProvider::editContact($id, $name, $email, $phone);
}


function is_iraqi_phone_number($phone_number) {
    // Iraqi phone numbers must start with +964 or 00964, followed by 10 digits or start with 07 followed by 9 digits
    $iraqi_regex = '/^(\\+964|00964)(7[0-9]{9}|8[0-9]{9}|9[0-9]{9})$|^(07)([0-9]{9})$/';
    return preg_match($iraqi_regex, $phone_number);
}

function login($emailLogin, $passwordLogin){
    $passwordLogin = md5($passwordLogin);
    if (authenticate_user($emailLogin, $passwordLogin)) {
        $user = getUser($emailLogin, $passwordLogin);

        setSession('id', $user[0]['id']);
        setSession('username', $user[0]['fullName']);
        return ['is_authenticated' => true, 'redirect_url' => 'contacts.php'];
    }
    return ['is_authenticated' => false, 'error' => 'ئیمەیڵ یان پاسۆرد نادروستە'];
}

function setSession($key, $value){
    $_SESSION[$key] = $value;
}

function validate_login_inputs($emailLogin, $passwordLogin) {
    $errors = [];

    if (empty($emailLogin)) {
        $errors['email'] = 'خانەی ئیمەیڵ بەتاڵە';
    } elseif (!is_valid_email($emailLogin)) {
        $errors['email'] = 'ئیمەیڵ گونجاو نیە';
    }

    if (empty($passwordLogin)) {
        $errors['password'] = 'پاسۆۆرد بەتاڵە';
    } elseif (strlen($passwordLogin) < 8) {
        $errors['password'] = 'پاسۆرد کەمترە لە ٨ پیت';
    }

    return $errors;
}


function validate_signup_inputs($name, $email, $password)
{
    $errors = [];

    if (empty($name)) {
        $errors['name'] = 'خانەی ناو بەتاڵە';
    }

    if (empty($email)) {
        $errors['email'] = 'خانەی ئیمەیڵ بەتاڵە';
    } elseif (!is_valid_email($email)) {
        $errors['email'] = 'ئیمەیڵ گونجاو نیە';
    }

    if (empty($password)) {
        $errors['password'] = 'پاسۆۆرد بەتاڵە';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'پاسۆرد کەمترە لە ٨ پیت';
    }

    return $errors;
}


function is_valid_email($email) {
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);
}


function export_to_csv($user_id)
{
    $contacts = UserProvider::getContacts($user_id);

    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contacts.csv');
    
    // Open output stream
    $output = fopen('php://output', 'w');
    
    // Write headers
    fputcsv($output, array('Name', 'Email', 'Phone'));
    
    // Loop through data and write to output stream
    foreach ($contacts as $row) {
        fputcsv($output, array($row['contact_name'], $row['email'], $row['phone']));
    }
    
    // Close output stream
    fclose($output);
    exit;
}