<?php
session_start();
$answer2 = $_POST['answer2'];
$_SESSION['answer2'] = $answer2;
?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="row"> 
<p class="question">Вопрос 3:</p>
<p class="text">Что такое jQuery?</p>
</div> 

<form action="task4.php" method="post">
  <input class="answer" type="text" name="answer3"/>
  <input class="submit" type="submit"/>
</form>
