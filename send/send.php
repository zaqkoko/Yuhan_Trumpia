<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>ToySend</title>

    <style media="screen">
        * {
            margin: 0 auto;
        }

        /* 날짜 영역 */

        #time {
            /* display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;
            border: 3px; */
            align-items: center;
            padding: 10px;
        }
/* 어딨냐
        #moreReceiver {
            top: 10%;
            left: 60%;
            position: fixed;
        } */

        #phonebook {
            /* display: none; */
            /* position: relative; */
            width: 100%;
            height: 100%;
            /* z-index: 1; */
        }

        #phonebook h4 {
            margin: 0;
        }

        #phonebook button {
            display: inline-block;
            width: 50px;
            margin-left: calc(100% - 100px - 10px);
        }

        #phonebook .phonebookcontents {
            text-align: center;
            width: 500px;
            margin: 100px auto;
            padding: 20px 10px;
            /* background: #fff; */
            border: 2px solid #7dabd0;
        }

        #phonebook .phonebooklayer {
            /* position: fixed; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* z-index: -1; */
        }

        #name {
            width: 50px;
        }

        textarea.autosize {
            width: 200px;
            min-height: 20px;
            max-height: 500px;
            resize: vertical;
        }

        .sms_text {
            resize: none;
        }

        center {
            width: 700px;
            height: 900px;
            background-color: #7dabd0;
            color: white;
        }
        table{
          border: 1px solid  #7dabd0;
          width: 400px;
        }
    </style>
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
                <thead>
                    <tr>
                        <th width="25%" class="name">이름</th>
                        <th width="35%"class="tel">번호</th>
                        <th width="50%"class="email">메일</th>
                    </tr>
                </thead>

                <tbody id="add">
                  <?php include 'select_addressbook.php'; ?>
                  </tr>
                </tbody>
            </table>
            <button type="button" id="phonebookclose">닫기</button>
        </div>

        <!-- 주소록 배경 -->
        <div class="phonebooklayer"></div>
    </div>

    <!-- 메세지 보내기 !-->
    <form action="send_db.php" method="POST" enctype="multipart/form-data">
        <div id="div">
            <center>
                <!-- 보류
                    <p id="clock" style="text-align:left; width:300px; margin:0 auto;">00:00</p>
                -->

                <button type="button" id="phonebookopen">주소록 열기</button><br><br>

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
                <textarea name="receiver_number" id="receiver_number" class="autosize" placeholder="수신 번호를 입력하세요" rows="1" style="text-align: center ;" onkeyup="resize(this)"></textarea><br>
                <textarea name="receiver_email" id="receiver_email" rows="1" class="autosize" placeholder="이메일을 입력하세요" style="text-align: center ;"></textarea>
                <p id="count" class="count" style="font-size: 13px;">

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
