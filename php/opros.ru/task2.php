<?php
session_start();
// Это хранилище сессий
$answer1 = $_POST['answer1'];
$_SESSION['answer1'] = $answer1;
?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="row"> 
<p class="question">Вопрос 2:</p>
<p class="text">Что такое Bootstrap?</p>
</div> 


<form action="task3.php" method="post">
  <input class="answer" type="text" name="answer2"/>
  <input class="submit" type="submit"/>
</form>
