<?php
session_start();
$answer8 = $_POST['answer8'];
$_SESSION['answer8'] = $answer8;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 9:</p>
<p class="text">Что такое REST API?</p>
</div> 

<form action="task10.php" method="post">
  <input class="answer" type="text" name="answer9"/>
  <input class="submit" type="submit"/>
</form>
