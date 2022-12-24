<!DOCTYPE html>
<?php
?>

<html lang="ru">
<head>
    <title>Регистрация на научную конференцию</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/grids-responsive-min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="main">
    <!--    <h2 class="content-head center">Регистрация участников конференции</h2>-->

    <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-8"> </div>
        <div class="l-box-lrg pure-u-1 pure-u-md-3-4 main-box">
            <form id="registerForm" class="pure-form pure-form-stacked" method="POST" enctype="multipart/form-data">
<!--                <fieldset>-->
                    <legend style="font-size: 2em">Регистрация участников конференции</legend>
                    <label for="name">Полное имя</label>
                    <input id="name" type="text" placeholder="Иванов Иван Иванович"
                           pattern="^[\u0400-\u04FF ]+$"
                           maxlength="100"
                           minlength="3"
                           required>
                    <span class="pure-form-message">Обязательное поле</span>

                    <label for="phone">Номер телефона</label>
                    <input id="phone" type="text" placeholder="+79991234567"
                           pattern="(^\+7)((\d{10}))$"
                           required>
                    <span class="pure-form-message">Обязательное поле</span>

                    <label for="email">Электрическая почта</label>
                    <input id="email" type="email"
                           pattern="(?:[a-z0-9!#$%&amp;'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+\/=?^_`{|}~-]+)*|&quot;(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*&quot;)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])"
                           placeholder="email@example.com"
                           maxlength="320"
                           required>
                    <span class="pure-form-message">Обязательное поле</span>

                    <!-- список: математика, физика, информатика -->
                    <label for="section">Секция конференции</label>
                    <select id="section">
                        <option>Математика</option>
                        <option>Физика</option>
                        <option>Информатика</option>
                    </select>
                    <span class="pure-form-message"></span>

                    <label for="birthdate">Дата рождения</label>
                    <input id="birthdate" type="date">
                    <span class="pure-form-message"></span>

                    <label for="report" class="pure-checkbox">
                        Доклад? <input type="checkbox" id="report" onchange="onReportChange()">
                    </label>
                    <span class="pure-form-message"></span>

                    <div id="reportNameDiv" style="display: none">
                        <label for="reportName">Название доклада</label>
                        <input id="reportName" type="text"
                               placeholder="Superrotation charge and supertranslation hair on black holes"
                               maxlength="400"
                        >
                        <span class="pure-form-message">Обязательное поле</span>
                    </div>

                    <button type="submit" class="pure-button">Зарегистрироваться</button>
<!--                </fieldset>-->
            </form>
        </div>
        <div class="pure-u-1 pure-u-md-1-8"> </div>
    </div>

</div>

<div class="footer">
    Developed by Daniil Tsarkov<br>Dubna State University<br><?php echo date("Y") ?>
</div>

</body>
<script src="js/script.js"></script>
</html>
