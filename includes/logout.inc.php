<?php

//we want to destroy the session variables in the website

session_start();

//unset any other sessions
session_unset();

//destroy session
session_destroy();

header("location: ../index.php");

//forgotten password system
//what is a token? one time password to authenticate that its a correct user that wants to change their password
//mail server to use the mail function in php

