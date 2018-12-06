<?php

require '../vendor/autoload.php';

$pdo = (new App\DatabaseConnection)->pdo;

$shoeInsertQuery = $pdo->prepare('insert into shoes (article_number, name, size, color, brand, price) values (:article_number, :name, :size, :color, :brand, :price)');

$colors = [
    'Brown',
    'Blue',
    'Magenta',
    'Yellow',
    'Grey',
    'Black',
    'White',
    'Green',
    'Lime',
    'Orange',
    'Purple',
    'Red',
];

$brands = [
    'Nike',
    'Adidas',
    'Jordan',
    'Puma',
    'Converse',
    'Scapino',
    'Vans',
    'Tommy Hilfiger',
];

$shoeNamePart1 = [
    'Retro',
    'Air',
    'Old Skool',
    'Trainer',
];

$shoeNamePart2 = [
    'Max',
    'Ultimate',
    'Elite',
    'Pro',
    'Force',
];

$shoeNamePart3 = [
    'Racer',
    'Hall Of Fame',
    'Metallic',
    'Halloween',
    'King',
    'Concord',
    'Spectrum',
];

for($i = 1; $i <= 10000; $i++){

    $shoeInsertQuery->execute([
        'article_number' => md5(rand()),
        'name' => "{$shoeNamePart1[array_rand($shoeNamePart1)]} {$shoeNamePart2[array_rand($shoeNamePart2)]} {$shoeNamePart3[array_rand($shoeNamePart3)]}",
        'size' => rand(30, 50),
        'color' => $colors[array_rand($colors)],
        'brand' => $brands[array_rand($brands)],
        'price' => rand(5000, 30000),
    ]);

}
