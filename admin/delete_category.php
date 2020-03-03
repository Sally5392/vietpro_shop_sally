<?php
define('SECURITY', true);
session_start();
include_once('../config/connect.php');
$cat_id = $_GET['cat_id'];
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql = "DELETE FROM category WHERE cat_id=$cat_id";
    $sql1 = "DELETE FROM product WHERE cat_id=$cat_id";
    $query = mysqli_query($connect, $sql);
    $query1 = mysqli_query($connect, $sql1);
    header('location: index.php?page_layout=category');
}else{
    header('location: index.php');
}
?>