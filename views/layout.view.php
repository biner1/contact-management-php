<?php

require('layout/header.php');

if(is_user_authenticated()){
    require('layout/navbar.php'); 
}

// main

require($name.".view.php");

//
require('layout/footer.php');