<!DOCTYPE html>
<?php
global $conn;

require("./model/dbconnect.php");
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
        <div class="pure-u-1 pure-u-md-1-8"></div>
        <div class="l-box-lrg pure-u-1 pure-u-md-3-4 main-box" style="text-align: center;">
            <h2 style="text-align: center"> Благодарим за подачу заявки. Вы зарегистрированы со следующими данными:</h2>

            <?php
            $sql = "SELECT name, phone, email, section, COALESCE(birthdate, 'Не указана') as birthdate, report, IF(reportName != '', reportName, 'Не указана') as reportName 
            FROM webtech.users where id = " . $_GET["id"];
            $result = $conn->query($sql);

            $res = array();

            while ($row = $result->fetch_assoc())
                $res[] = $row;

            ?>
            <table class="pure-table" style="margin-left: auto;margin-right: auto;">
                <thead>
                <tr>
                    <th>Имя</th>
                    <td><?php echo $res[0]["name"]; ?></td>
                </tr>
                <tr>
                    <th>Номер телефона</th>
                    <td><?php echo $res[0]["phone"]; ?></td>
                </tr>
                <tr>
                    <th>Электрическая почта</th>
                    <td><?php echo $res[0]["email"]; ?></td>
                </tr>
                <tr>
                    <th>Секция конференции</th>
                    <td><?php echo $res[0]["section"]; ?></td>
                </tr>
                <tr>
                    <th>Дата рождения</th>
                    <td><?php echo $res[0]["birthdate"]; ?></td>
                </tr>
                <tr>
                    <th>Тема доклада</th>
                    <td><?php echo $res[0]["reportName"]; ?></td>
                </tr>
                </thead>
                <tbody id="tableContent">

                </tbody>
            </table>

            <a class="pure-button" href="table.php" style="margin-top: 1em">Перейти к списку участников</a>
        </div>
        <div class="pure-u-1 pure-u-md-1-8"></div>
    </div>

</div>

<div class="footer">
    Developed by Daniil Tsarkov<br>Dubna State University<br><?php echo date("Y") ?>
</div>

</body>
<script src="js/script.js"></script>
</html>
