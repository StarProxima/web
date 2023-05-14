<?php
  // Читаем данные из файла
  $product_data = file('products.txt');

  echo '<table border="1">';
  echo '<tr><th>Название товара</th><th>Цена</th><th>Количество</th></tr>';

  // Выводим данные в виде таблицы
  foreach ($product_data as $product) {
    list($product_name, $price, $quantity) = explode(', ', $product);
    echo '<tr><td>' . $product_name . '</td><td>' . $price . '</td><td>' . $quantity . '</td></tr>';
  }

  echo '</table>';
?>