<?php
    //include '../title.php';
    include 'cal_db.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <style media="screen">
            *
                {margin : 0 auto; overflow: auto;}
            #caption
                {font-weight: bold; font-size: 30px; height: 50px; text-align: center; padding-top: 20px;}
            #caption span
                {color : #7dabd0;}
            #caption input
                {background-color: #7dabd0; color : #fff; border : none; height: 20px;}
            th
                {background-color: #7dabd0; color : #fff; }
            table, th, tr ,td
                {border: 1px solid #7dabd0; border-collapse: collapse; font-weight: bold;}
            td
                {width: 100px; height: 70px; text-align: left; vertical-align: top; color : #7dabd0;}
            td:hover
                {background:#EBF7FF;}
            .sendtile
                {background-color: #FAF4C0; color: #A6A6A6; text-align: center;}
            .senttile
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
            <input type="button" name="leftButton" value="<" onclick="leftBtn()">
            <span id="YearMonthText"></span>
            <input type="button" name="rightButton" value=">" onclick="rightBtn()">
        </div>
        <table id="calendarTable">
            <th>SUN</th>
            <th>MON</th>
            <th>TUE</th>
            <th>WED</th>
            <th>THU</th>
            <th>FRI</th>
            <th>SAT</th>

            <tr id="firstWeek">
                <td id="1"></td>
                <td id="2"></td>
                <td id="3"></td>
                <td id="4"></td>
                <td id="5"></td>
                <td id="6"></td>
                <td id="7"></td>
            </tr>

            <tr id="secondWeek">
                <td id="8"></td>
                <td id="9"></td>
                <td id="10"></td>
                <td id="11"></td>
                <td id="12"></td>
                <td id="13"></td>
                <td id="14"></td>
            </tr>

            <tr id="thirdWeek">
                <td id="15"></td>
                <td id="16"></td>
                <td id="17"></td>
                <td id="18"></td>
                <td id="19"></td>
                <td id="20"></td>
                <td id="21"></td>
            </tr>

            <tr id="fourthWeek">
                <td id="22"></td>
                <td id="23"></td>
                <td id="24"></td>
                <td id="25"></td>
                <td id="26"></td>
                <td id="27"></td>
                <td id="28"></td>
            </tr>

            <tr id="fifthWeek">
                <td id="29"></td>
                <td id="30"></td>
                <td id="31"></td>
                <td id="32"></td>
                <td id="33"></td>
                <td id="34"></td>
                <td id="35"></td>
            </tr>

            <tr id="sixthWeek">
                <td id="36"></td>
                <td id="37"></td>
                <td id="38"></td>
                <td id="39"></td>
                <td id="40"></td>
                <td id="41"></td>
                <td id="42"></td>
            </tr>
        </table>


        </div>
        <div id="sendModal" class="modal">
            <div class="modal_content">
                <span id="send_modalClose" class="close">&times;</span>
                <h2>발송 예약 리스트</h2>
                <?php
                    while($row = mysqli_fetch_array($d_result)) {
                ?>
                <?php
                    echo "받을 사람: " . $row[0]. " 보낼 메세지: " . $row[1]. " 보낼 시간: " . $row[2] . "<br>"
                ?>
                <?php
                    }
                ?>
            </div>
        </div>
        <div id="sentModal" class="modal">
            <div class="modal_content">
                <span id="sent_modalClose" class="close">&times;</span>
                <h2>발송 완료 리스트</h2>
                <?php
                    while($row = mysqli_fetch_array($t_result)) {
                ?>
                <?php
                    echo "받은 사람: " . $row[0]. " 보낸 메세지: " . $row[1]. " 보낸 시간: " . $row[2] . "<br>"
                ?>
                <?php
                    }
                ?>
            </div>
        </div>
        <script type="text/javascript" src="cal_script.js"></script>
    </body>
</html>
