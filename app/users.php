<?php
    include_once '../objects/Users.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <link rel="stylesheet" href="/app/assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <script src="/app/assets/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>

<!---->

<!-- здесь будет выводиться наше приложение -->
<div id="app"></div>

<!-- jQuery -->
<script src="/app/assets/js/jquery.js"></script>
<!--<script src="/app/assets/js/jquery.min.js" type="text/javascript"></script>-->
<script src="/app/assets/js/highcharts.js" type="text/javascript"></script>

<!-- bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- для всплывающих окон -->
<!--<script src="/app/assets/js/bootbox.min.js"></script>-->

<!-- основной файл скриптов -->
<script src="/app/app.js"></script>

<!-- products scripts -->
<script src="/app/users/read-users.js"></script>
<script src="/app/users/read_one_user.js"></script>


</body>
</html>