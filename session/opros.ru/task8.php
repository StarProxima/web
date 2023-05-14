<?php
session_start();
$answer7 = $_POST['answer7'];
$_SESSION['answer7'] = $answer7;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 8:</p>
<p class="text">Что такое Drupal?</p>
</div> 

<form action="task9.php" method="post">
  <input class="answer" type="text" name="answer8"/>
  <input class="submit" type="submit"/>
</form>
