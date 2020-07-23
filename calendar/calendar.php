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
            #lb
            {position: fixed; left: 30%; top: 5%;}
            #rb
            {position: fixed; right: 30%; top: 5%;}
            th
                {background-color: #7dabd0; color : #fff; height: 70px;}
            table, tr ,td
                {border: 1px solid #7dabd0; border-collapse: collapse; font-weight: bold;}
            td
                {width: 100px; height: 70px; text-align: left; vertical-align: top; color : #7dabd0;}
            td:hover
                {background:#EBF7FF;}
            .sendTile
                {background-color: #FAF4C0; color: #A6A6A6; text-align: center;}
            .sentTile
                {background-color: #FFD8D8; color: #A6A6A6; text-align: center;}
            .sendtile:hover
                {color : black; cursor: pointer;}
            .senttile:hover
                {color : black; cursor: pointer;}
            .modal
                {display: none; z-index: 1;position: fixed; width: 100%; height: 100%;top : 0; left : 0; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);}
            .modal_content
                {background-color: #fff; color:#7dabd0; position: fixed; width: 50%; height: 40%; top: 25%; left: 25%;}
            .close
                {color: #7dabd0; float: right; font-size: 28px; font-weight: bold;}
            .close:hover, .close:focus
                {color: black; cursor: pointer;}

        </style>
    </head>
    <body>

        <div id="caption">
            <input type="button" id="lb" name="leftButton" value="<" onclick="leftBtn()">
            <span id="current-year-month"></span>
            <input type="button" id="rb" name="rightButton" value=">" onclick="rightBtn()">
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
        <div id="sendModal" class="modal">
            <div class="modal_content">
                <span id="send_modalClose" class="close">&times;</span>
                <h2>발송 예약 리스트</h2>
            </div>
        </div>
        <div id="sentModal" class="modal">
            <div class="modal_content">
                <span id="sent_modalClose" class="close">&times;</span>
                <h2>발송 완료 리스트</h2>
            </div>
        </div>


        <script type="text/javascript" src="cal_sc.js"></script>
    </body>
</html>
