<?php


namespace App;

use Twig_Environment;
use Twig_Loader_Filesystem;

class PageLoader
{
    private $twig;
    private $db;

    public function __construct(){
        $this->twig = new Twig_Environment(
            new Twig_Loader_Filesystem(PROJECT_ROOT.'views')
        );

        $this->db = new DatabaseConnection;
    }

    public function brandsOverview(){
        echo $this->twig->render('brandsOverview.twig',
            [
                'brands' => $this->db->getAllBrands(),
            ]
        );
    }

    public function shoesOverview($brand){
        echo $this->twig->render('shoesOverview.twig',
            [
                'shoes' => $this->db->getAllShoesFromBrand($brand),
                'brand' => $brand,
            ]
        );
    }
}
