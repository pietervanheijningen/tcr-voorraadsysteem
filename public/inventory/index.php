<?php

require '../../vendor/autoload.php';

$pageLoader = new \App\PageLoader();

if(isset($_GET['brand']) AND isset($_GET['shoeName'])){
    $pageLoader->inventoryOverview($_GET['brand'], $_GET['shoeName']);
}else{
    redirectToHomePage();
}
