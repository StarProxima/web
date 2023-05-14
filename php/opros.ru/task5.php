<?php
session_start();
$answer4 = $_POST['answer4'];
$_SESSION['answer4'] = $answer4;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 5:</p>
<p class="text">Что такое браузер?</p>
</div> 

<form action="task6.php" method="post">
  <input class="answer" type="text" name="answer5"/>
  <input class="submit" type="submit"/>
</form>

