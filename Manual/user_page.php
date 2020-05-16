<?php
session_start();
$token=$_SESSION['token'];
$profile=file_get_contents("https://graph.facebook.com/v7.0/me/?access_token=${token}");

print_r($profile);