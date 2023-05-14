<?php
session_start();
$answer3 = $_POST['answer3'];
$_SESSION['answer3'] = $answer3;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 4:</p>
<p class="text">Что такое веб-сервер?</p>
</div> 

<form action="task5.php" method="post">
  <input class="answer" type="text" name="answer4"/>
  <input class="submit" type="submit"/>
</form>
