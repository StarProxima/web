<?php
session_start();
$answer10 = $_POST['answer10'];
$_SESSION['answer10'] = $answer10;

$questions = array(
    '1' => array(
        'question' => 'Что такое PHP?',
        'answer' => 'язык программирования',
    ),
    '2' => array(
        'question' => 'Что такое Bootstrap?',
        'answer' => 'библиотека CSS',
    ),
    '3' => array(
        'question' => 'Что такое jQuery?',
        'answer' => 'библиотека JavaScript',
    ),
    '4' => array(
        'question' => 'Что такое веб-сервер?',
        'answer' => 'сервер, обслуживающий веб-ресурсы',
    ),
    '5' => array(
        'question' => 'Что такое браузер?',
        'answer' => 'программа для просмотра веб-страниц',
    ),
    '6' => array(
        'question' => 'Что такое HTTPS?',
        'answer' => 'безопасный протокол передачи данных',
    ),
    '7' => array(
        'question' => 'Что такое DNS?',
        'answer' => 'система преобразования имен в IP-адреса',
    ),
    '8' => array(
        'question' => 'Что такое Drupal?',
        'answer' => 'система управления содержимым',
    ),
    '9' => array(
        'question' => 'Что такое REST API?',
        'answer' => 'интерфейс для взаимодействия систем',
    ),
    '10' => array(
        'question' => 'Что такое мобильная адаптация?',
        'answer' => 'процесс оптимизации веб-дизайна для мобильных устройств',
    ),
);

$num_correct = 0;
$wrong_answers = array();

foreach ($questions as $num => $data) {
    if (isset($_SESSION['answer'.$num]) && $_SESSION['answer'.$num] != '')
    {
        if ($_SESSION['answer'.$num] == $data['answer'])
            $num_correct++;
        else
        {
            $wrong_answers[$num] = array(
                'input' => $_SESSION['answer'.$num],
                'correct' => $data['answer']
            );
        }
    }
    else
    {
        $wrong_answers[$num] = array(
            'input' => 'Ответ не дан',
            'correct' => $data['answer']
        );
    }
}

echo "<p>Вы ответили правильно на $num_correct из ".count($questions)." вопросов.</p>";

if (!empty($wrong_answers)) {
    echo "<br><p>Неправильные ответы:</p>";
    foreach ($wrong_answers as $num => $answer) {
        echo "<p>Вопрос $num: Ваш ответ: {$answer['input']}, Правильный ответ: {$answer['correct']}</p>";
    }
}

session_unset();
session_destroy();
?>
