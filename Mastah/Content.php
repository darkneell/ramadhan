<?php
$page = '';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
$file = "$page.php";


if(!file_exists($file) || empty($page)){ 
    include "Beranda.php"; 
  }else{ 
   include "$file"; 
}
?>
