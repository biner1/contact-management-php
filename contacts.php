<?php

session_start();
require('config/app.php');

ensure_user_is_authenticated();


// add
if(isset($_POST['addContact'])){
    $name = sanitize($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    if((is_valid_email($email) || $email == '') && is_numeric($phone)){
        createContact($name, $email, $phone,  $_SESSION['id']);
    }
    redirect("contacts.php");
}

// update
if(isset($_POST['update'])){
    $id = $_POST['contact_id'];
    $name = sanitize($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if((is_valid_email($email) || $email == '') && is_numeric($phone)){
        editContact($id, $name, $email, $phone);
    }
    redirect("contacts.php");
}

// delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    UserProvider::deleteContact($id);
    redirect("contacts.php");
}


if(isset($_GET['search'])){
    $contacts = UserProvider::search_contacts($_GET['search'], $_SESSION['id']);
    $view_bag['heading'] = 'Search result for ' . $_GET['search'];
    view('contacts', $contacts);
}else if(isset($_GET['export'])){
    if($_GET['export'] == 'csv'){
        $contacts = UserProvider::getContacts($_SESSION['id']);
        export_to_csv($_SESSION['id']);
    }
    redirect("contacts.php");
}
else{
    $contacts = UserProvider::getContacts($_SESSION['id']);
    view('contacts', $contacts);
}


