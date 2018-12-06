<?php

require '../../vendor/autoload.php';

$pageLoader = new \App\PageLoader();

if(isset($_GET['brand'])){
    $pageLoader->shoesOverview($_GET['brand']);
}else{
    redirectToHomePage();
}
