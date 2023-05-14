<?php
session_start();
$answer6 = $_POST['answer6'];
$_SESSION['answer6'] = $answer6;
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="row"> 
<p class="question">Вопрос 7:</p>
<p class="text">Что такое DNS?</p>
</div> 

<form action="task8.php" method="post">
  <input class="answer" type="text" name="answer7"/>
  <input class="submit" type="submit"/>
</form>
