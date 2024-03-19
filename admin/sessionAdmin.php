<?php

if ('admin' !== $_SESSION['user']['role']) {
    unset($_SESSION['user']);
    
    header(header: 'location: login.php');
}