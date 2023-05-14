<?php
session_start();
?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="row"> 
  <p class="question">Вопрос 1:</p>
  <p class="text">Что такое PHP?</p>
</div> 

<form action="task2.php" method="post">
  <input class="answer" type="text" name="answer1"/>
  <input class="submit" type="submit"/>
</form>
