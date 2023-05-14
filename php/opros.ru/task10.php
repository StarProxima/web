<?php
session_start();
$answer9 = $_POST['answer9'];
$_SESSION['answer9'] = $answer9;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 10:</p>
<p class="text">Что такое мобильная адаптация?</p>>
</div> 

<form action="result.php" method="post">
  <input class="answer" type="text" name="answer10"/>
  <input class="submit" type="submit"/>
</form>
