function toggleContent(id) {
    var content = document.getElementById("content" + id);
    if (content.style.display === "block") {
        content.style.display = "none";
    } else {
        content.style.display = "block";
    }
}


// Task1
function showDateTime() {
    let now = new Date();

    //год с незначащими нулями
    let year = now.getFullYear();

    let month = (now.getMonth() + 1).toString().padStart(2, '0');
    let day = now.getDate().toString().padStart(2, '0');
    let daysOfWeek = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
    // полные дни
    let fullDaysOfWeek = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

    let monthOfYeat = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август',
        'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

    let mon = monthOfYeat[now.getMonth()];

    let day_week = fullDaysOfWeek[now.getDay() - 1];

    let status_date = `${day_week}, ${year} ${day} ${mon}`;

    var hour = now.getHours();
    var ampm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12;

    let hours = hour.toString().padStart(2, '0');
    let minutes = now.getMinutes().toString().padStart(2, '0');
    let seconds = now.getSeconds().toString().padStart(2, '0');

    let status_time = `${hours}:${minutes}:${seconds} ${ampm}`;

    let content1 = document.getElementById("content1");
    content1.innerHTML = status_date + ' ' + status_time;
}

//Task2
function Сalendar(id, year, month) {
    var Dlast = new Date(year, month + 1, 0).getDate(),
        D = new Date(year, month, Dlast),
        DNlast = new Date(D.getFullYear(), D.getMonth(), Dlast).getDay(),
        DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay(),
        calendar = '<tr>',
        month = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    if (DNfirst != 0) {
        for (var i = 1; i < DNfirst; i++)
            calendar += '<td>';
    }
    else {
        for (var i = 0; i < 6; i++)
            calendar += '<td>';
    }
    // check today
    for (var i = 1; i <= Dlast; i++) {
        if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
            calendar += '<td class="today">' + i;
        } else {
            calendar += '<td>' + i;
        }

        if (new Date(D.getFullYear(), D.getMonth(), i).getDay() == 0) {
            calendar += '<tr>';
        }
    }

    for (var i = DNlast; i < 7; i++)
        calendar += '<td>&nbsp;';

    document.querySelector('#' + id + ' tbody').innerHTML = calendar;
    document.querySelector('#' + id + ' thead td:nth-child(2)').innerHTML = month[D.getMonth()] + ' ' + D.getFullYear();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.month = D.getMonth();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.year = D.getFullYear();

    if (document.querySelectorAll('#' + id + ' tbody tr').length < 6) {
        document.querySelector('#' + id + ' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
    }

    // button prev month
    document.querySelector('#calendar thead tr:nth-child(1) td:nth-child(1)').onclick = function () {
        Сalendar("calendar", document.querySelector('#calendar thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar thead td:nth-child(2)').dataset.month) - 1);
    }
    // button next month
    document.querySelector('#calendar thead tr:nth-child(1) td:nth-child(3)').onclick = function () {
        Сalendar("calendar", document.querySelector('#calendar thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar thead td:nth-child(2)').dataset.month) + 1);
    }
}
Сalendar("calendar", new Date().getFullYear(), new Date().getMonth());

function executeTask3() {
    forms = document.getElementsByTagName("FORM");
    content3 = document.getElementById("task3_text");
    content3.textContent = "Найдено форм: " + forms.length;
}