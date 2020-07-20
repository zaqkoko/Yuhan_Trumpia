<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <!-- CSS -->
    <link rel= "stylesheet" type="text/css" href="cal_style.css">
  </head>
  <body>
    <!--메뉴바, 채팅버튼 등 만들어둔 php파일 include, db연동하는 php파일도 include.-->
    <?php
    include '../title.php';
    include 'cal_db.php';
    ?>
    <!--HTML-->
    <!--캡션 //달력의 위-->
    <div id="caption">
      <!--이전 달 선택 버튼, 이전 달 이벤트 연결하기-->
      <input type="button" name="leftButton" value="<" onclick="leftBtn()">
      <!--현재 년,월 표시 텍스트 //inline속성을 원해서 span사용-->
      <span id="YearMonthText"></span>
      <!--다음 달 선택 버튼, 다음 달 이벤트 연결하기-->
      <input type="button" name="rightButton" value=">" onclick="rightBtn()">
    </div>

    <!--달력 테이블 //페이지 중앙-->
    <table id="calendarTable">
      <!--일,월,화,수,목,금,토 table header cell //달력 상단부-->
      <th>SUN</th>
      <th>MON</th>
      <th>TUE</th>
      <th>WED</th>
      <th>THU</th>
      <th>FRI</th>
      <th>SAT</th>
      <!--1주-->
      <tr id="firstWeek">
        <td id="1"></td>
        <td id="2"></td>
        <td id="3"></td>
        <td id="4"></td>
        <td id="5"></td>
        <td id="6"></td>
        <td id="7"></td>
      </tr>
      <!--2주-->
      <tr id="secondWeek">
        <td id="8"></td>
        <td id="9"></td>
        <td id="10"></td>
        <td id="11"></td>
        <td id="12"></td>
        <td id="13"></td>
        <td id="14"></td>
      </tr>
      <!--3주-->
      <tr id="thirdWeek">
        <td id="15"></td>
        <td id="16"></td>
        <td id="17"></td>
        <td id="18"></td>
        <td id="19"></td>
        <td id="20"></td>
        <td id="21"></td>
      </tr>
      <!--4주-->
      <tr id="fourthWeek">
        <td id="22"></td>
        <td id="23"></td>
        <td id="24"></td>
        <td id="25"></td>
        <td id="26"></td>
        <td id="27"></td>
        <td id="28"></td>
      </tr>
      <!--5주-->
      <tr id="fifthWeek">
        <td id="29"></td>
        <td id="30"></td>
        <td id="31"></td>
        <td id="32"></td>
        <td id="33"></td>
        <td id="34"></td>
        <td id="35"></td>
      </tr>
      <!--6주. display 속성의 디폴트는 none. 보여주고싶으면 table-row로 변경.-->
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

    <!--예약 모달 //평소에는 숨어있음 //타일을 클릭하면 그 옆에 뿅 나옴-->
    <div id="sendModal" class="modal">
      <!--모달 컨텐츠-->
      <div class="modal_content">
        <!--모달 닫기. x는 엔티티때문에 저렇게 써야함-->
        <span id="send_modalClose" class="close">&times;</span>
        <!--테스트용 임시 리스트-->
        <h2>발송 예약 리스트(가짜)</h2>
        <div id="dModal_list">
        </div>
      </div>
    </div>

    <!--발송 모달 //평소에는 숨어있음 //타일을 클릭하면 그 옆에 뿅 나옴-->
    <div id="sentModal" class="modal">
      <!--모달 컨텐츠-->
      <div class="modal_content">
        <!--모달 닫기. x는 엔티티때문에 저렇게 써야함-->
        <span id="sent_modalClose" class="close">&times;</span>
        <!--테스트용 임시 리스트-->
        <h2>발송 완료 리스트(가짜)</h2>
        <ul>
          <li>2020.07.1 09:00, 01033339573, hi. it's modal test1.</li>
          <li>2020.07.1 10:00, 01033339573, hi. it's modal test2.</li>
          <li>2020.07.1 11:00, 01033339573, hi. it's modal test3.</li>
          <li>2020.07.1 12:00, 01033339573, hi. it's modal test4.</li>
          <li>2020.07.1 13:00, 01033339573, hi. it's modal test5.</li>
        </ul>
      </div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="cal_script.js"></script>
  </body>
</html>
