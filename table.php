<!DOCTYPE html>
<?php
?>

<html lang="ru">
<head>
    <title>Список участников научной конференции</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/grids-responsive-min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        html {
            background-color: unset !important;
        }
    </style>
</head>

<body>

<div class="main">
    <h2 class="content-head center">Список участников конференции</h2>

    <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-8" style="margin-bottom: 1em">
            <button class="pure-button" onclick="loadTable()">Обновить список</button>
        </div>
        <div class="pure-u-1 pure-u-md-3-4" style="overflow-y: auto;">
            <table class="pure-table" style="margin-left: auto;margin-right: auto;">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Номер телефона</th>
                    <th>Электрическая почта</th>
                    <th>Секция конференции</th>
                    <th>Дата рождения</th>
                    <th>Тема доклада</th>
                </tr>
                </thead>
                <tbody id="tableContent">

                </tbody>
            </table>
        </div>
        <div class="pure-u-1 pure-u-md-1-8"></div>
    </div>


</div>

<div class="footer" style="background-color: #dddddd !important;">
    Developed by Daniil Tsarkov<br>Dubna State University<br><?php echo date("Y") ?>
</div>


</body>
<script src="js/script.js"></script>
<script> loadTable() </script>
</html>
