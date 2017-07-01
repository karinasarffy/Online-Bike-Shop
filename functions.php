<?php
//Get our config file
require_once(dirname(__FILE__) . '/config.php');
//start the session
session_start();
//verify if user is logged in
if (!isset($_SESSION['loggedIn']))
    $_SESSION['loggedIn']=false;
//verify if user is admin
if (!isset($_SESSION['isAdmin']))
    $_SESSION['isAdmin']=false;
//output the page title
function the_title()
{
    global $title;
    echo $title;
}
//output home URL
function home_url()
{
    echo ABS_URL;
}
//connection to the database
global $conn;
function connectToDB(){
    $conn = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
}
//cleanup the extra spaces & special characters from data
function cleanup($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

