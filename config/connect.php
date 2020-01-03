<?php
if(!defined('SECURITY')){
    die('Ban khong co quyen truy cap file nay');
}
$connect = mysqli_connect('127.0.0.1', 'sallynguyen', 'admin', 'vietpro_mobile_shop', '3306');
if($connect){
    mysqli_query($connect, "SET NAMEs 'utf8' ");
   // print_r('ket noi thanh cong');
}else{
    echo "ket noi that bai";
}
?>

