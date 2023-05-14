<?php
  // Проверяем, что все поля формы заполнены
  if (isset($_POST['product_name']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Проверяем корректность данных
    if (!empty($product_name) && is_numeric($price) && is_numeric($quantity)) {
        // Если данные корректны, сохраняем их в файл
        $product_data = $product_name . ', ' . $price . ', ' . $quantity . "\n";
        file_put_contents('products.txt', $product_data, FILE_APPEND | LOCK_EX);
        echo 'Данные сохранены.';
    } else {
        echo 'Неверные данные.';
    }
  } else {
    echo 'Все поля должны быть заполнены.';
  }
?>