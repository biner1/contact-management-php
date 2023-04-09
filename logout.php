<?php

session_start();

require('config/app.php');

session_unset();
session_destroy();


redirect('login.php');