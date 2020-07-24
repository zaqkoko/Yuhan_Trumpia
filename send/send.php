<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>ToySend</title>
    <link rel="stylesheet" href="css_send.css">
</head>

<body>
    <!-- http://localhost/Yuhan_Trumpia/title.php 작동 되지않음 -->
    <!-- $_SERVER['DOCUMENT_ROOT'] 작동 되지않음 -->
    <?php include "../title.php" ?>
    <?php include "../db.php" ?>

    <!-- 주소록 -->
    <div id="phonebook">
        <!-- 주소록 내용 -->
        <div class="phonebookcontents">
            <legend>주소록 목록</legend><br>
            <table>
              <tr>
                  <th width="25%">이름</th>
                  <th width="35%">번호</th>
                  <th width="50%">메일</th>
              </tr>
            </table>
            <table id="add">
              <?php include 'data_select_send.php'; ?>
            </table>
            <!-- 선택한 수신자 출력해주는 상자 -->
            <!-- 임시 스타일 -->
            <div id="box" style="background:#ebf7ff; width:400px; height:50px; padding-top:10px;">

            </div>
            <button type="button" id="phonebookclose">닫기</button>
            <button type="button" id='phonebookok' style="display:none;">확인</button>
        </div>

        <!-- 주소록 배경 -->
        <div class="phonebooklayer"></div>
    </div>

    <!-- 메세지 보내기 !-->
    <form action="send_db.php" method="POST">
        <div id="div">
            <center>
                <!-- 보류
                    <p id="clock" style="text-align:left; width:300px; margin:0 auto;">00:00</p>
                -->

                <button type="button" id="phonebookopen" >주소록 열기</button><br><br>

                <h4>발송 선택에서 현재, 예약 중 선택 후 날짜를 입력해 주세요.</h4> <br>

                <!-- 현재, 예약인지 선택. Select Box -->
                <label for="send_type">발송 : </label>
                <select name="send_type" id="send_type">
                    <option value="" selected="selected">선택</option>
                    <option value="1">현재</option>
                    <option value="2">예약</option>
                </select>

                <label style="padding-right: 10px;">날짜 설정</label>

                <!-- 날짜, 시간 불러오기 -->
                <input type="datetime-local" id="send_time" name="send_time" readonly> <br> <br>

                <!-- 수신 번호 입력 (input에서 textarea로 바꿈) -->
                <textarea name="receiver_number" id="receiver_number" class="autosize" placeholder="수신 번호를 입력하세요"  rows="1" style="text-align: center ;" onkeyup="resize(this)"></textarea><br>
                <p id="count" class="count" style="font-size: 13px;">
                    <!-- 아직 구현중. 번호 입력하기 시작하면 증가연산자 사용으로 1씩 증가, 엔터치고 다시 번호 입력 시작하면 다시 1 증가-->
                    <span id="num" class="num">0</span>명 수신예정 <br><br>
                </p>
                <!-- 수신 이메일 입력 -->
                <textarea name="receiver_email" id="receiver_email" rows="1" class="autosize" placeholder="이메일을 입력하세요" onkeyup="resize(this)" style="text-align: center ;"></textarea>
                <p id="count" class="count" style="font-size: 13px;">
                    <!-- 아직 구현중. 번호 입력하기 시작하면 증가연산자 사용으로 1씩 증가, 엔터치고 다시 번호 입력 시작하면 다시 1 증가-->
                    <span id="num" class="num">0</span>명 수신예정 <br><br>
                </p>
                <!-- 본문 입력 -->
                <textarea name="sms_text" placeholder="메세지를 입력하세요. 150자까지 입력이 가능합니다." id="sms_text" value="" maxlength="150" style="text-align:left; width:400px; height:300px;"></textarea> <br>
                <span id="counter">###</span> <br>
                <!-- 파일 업로드 -->
                <input type="file" name="file" style="background-color:white; color:#7dabd0;"><br>

                <!-- 발송 -->
                <input type="submit" value="메세지 보내기" id="subButton" />
            </center>
        </div>

    </form>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="send.js"></script>
</body>

</html>
