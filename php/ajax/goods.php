<?php
header('Content-Type: application/json');

$products = [
    1 => [
        'name' => 'Товар 1',
        'weight' => '1 кг',
        'cost' => '100 руб.',
        'img' => 'img1.jpeg',
    ],
    2 => [
        'name' => 'Товар 2',
        'weight' => '2 кг',
        'cost' => '200 руб.',
        'img' => 'img2.jpeg',
    ],
];

if (isset($_GET['art'])) {
    $art = $_GET['art'];
    if (isset($products[$art])) {
        echo json_encode($products[$art]);
    } else {
        echo json_encode(['error' => 'Товар не найден']);
    }
}
?>