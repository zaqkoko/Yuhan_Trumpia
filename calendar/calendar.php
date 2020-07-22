<?php
    include '../title.php';
    include 'cal_db.php';
?>

<!DOCTYPE html>
<html lang="kr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>TOY_CAL</title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <style media="screen">
            *
                {margin: 0 auto; text-align: center;}
            #caption
                {font-weight: bold; font-size: 30px; height: 50px; text-align: center; padding-top: 20px;}
            #caption span
                {color : #7dabd0;}
            #caption input
                {background-color: #7dabd0; color : #fff; border : none; height: 20px;}
            th
                {background-color: #7dabd0; color : #fff; height: 70px;}
            table, tr ,td
                {border: 1px solid #7dabd0; border-collapse: collapse; font-weight: bold;}
            td
                {width: 100px; height: 70px; text-align: left; vertical-align: top; color : #7dabd0;}
            td:hover
                {background:#EBF7FF;}
            #sendTile
                {background-color: #FAF4C0; color: #A6A6A6; text-align: center;}
            #sentTile
                {background-color: #FFD8D8; color: #A6A6A6; text-align: center;}
            #sendtile:hover
                {color : black; cursor: pointer;}
            #senttile:hover
                {color : black; cursor: pointer;}

        </style>
    </head>
    <body>

        <div id="caption">
            <input type="button" name="leftButton" value="<" onclick="leftBtn()">
            <span id="current-year-month"></span>
            <input type="button" name="rightButton" value=">" onclick="rightBtn()">
        </div>
            <table id="calendar" align="center">
                <thead>
                        <th>SUN</th>
                        <th>MON</th>
                        <th>TUE</th>
                        <th>WED</th>
                        <th>THU</th>
                        <th>FRI</th>
                        <th>SAT</th>
                </thead>
                <tbody id="calendar-body" class="calendar-body"></tbody>
            </table>
        <script type="text/javascript" src="cal_sc.js"></script>
    </body>
</html>
