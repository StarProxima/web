<?php
session_start();
$answer5 = $_POST['answer5'];
$_SESSION['answer5'] = $answer5;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 6:</p>
<p class="text">Что такое HTTPS?</p>
</div> 

<form action="task7.php" method="post">
  <input class="answer" type="text" name="answer6"/>
  <input class="submit" type="submit"/>
</form>
