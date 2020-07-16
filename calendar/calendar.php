<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <!--CSS-->
    <style media="screen">
      #caption
      {
        /* 절대 위치. 상하좌우 %를 사용해서 해당 위치에 배치시킨다. */
        position: fixed;
        top : 5.5%;
        left : 42.5%;
        font-size: 200%;
      }
      #YearMonthText
      {
        /* 해당 텍스트 굵게 처리. */
        font-weight: bold;
      }
      #calendarTable
      {
        position: fixed;
        top: 12.5%;
        left: 25%;
        width: 50%;
      }
      table, th, tr ,td
      {
        border: 1px
        solid skyblue;
        /* 테이블과 셀 사이의 간격을 없앤다. */
        border-collapse: collapse;
      }
      th
      {
        width: 70px;
        height: 30px;
        /* 테이블 헤더 셀은 코랄계열 색상. */
        background-color: #ebbcbc;
      }
      td
      {
        height: 100px;
        /* 텍스트 좌측 정렬 */
        text-align: left;
        /* 수직 정렬 상단 */
        vertical-align: top;
      }
      /* 셀에 마우스를 올렸을때, 하늘색으로 채움. */
      td:hover
      {
        background-color: skyblue;
      }
      #sixthWeek
      {
        /*6주의 row는 껏다켯다 하기*/
        display: none;
      }
      .sendtile
      {
        background-color: #BCF5A9;
        color: gray;
        /*visibility: hidden;*/
      }
      .senttile
      {
        background-color: #F5D0A9;
        color: gray;
        /*visibility: hidden;*/
      }
      /* 예약 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. 커서를 포인터로.*/
      .sendtile:hover
      {
        color : black;
        font-size: 125.5%;
        cursor: pointer;
      }
      /* 발송 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. 커서를 포인터로.*/
      .senttile:hover
      {
        color : black;
        font-size: 125.5%;
        cursor: pointer;
      }
      /* tr,td의 앞에서부터 1번째 요소들은 */
      tr td:nth-child(1)
      {
        /* 빨간색으로 */
			  color: red;
		  }
      /* tr,td의 앞에서부터 7번째 요소들은 */
      tr td:nth-child(7)
      {
        /* 파랑색으로 */
			  color: blue;
		  }
      /* 타일 누르면 나오는 모달 */
      .modal
      {
        /* 모달의 디폴트는 안보이게. 영역도 차지하지 않음. 누르면 보이게. */
        display: none;
        /* 모달은 기존 view의 위에 배치한다. */
        z-index: 1;
        position: fixed;
        /* 브라우저 전체를 모달로 덮고 */
        width: 100%;
        height: 100%;
        top : 0;
        left : 0;
        /* 내용이 많으면 스크롤은 자동으로 추가 */
        overflow: auto;
        /* 배경은 검정에 투명도 0.4 */
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
      }
      /* 모달 내부 content */
      .modal_content
      {
        background-color: white;
        /* 중앙으로 배치 */
        position: fixed;
        width: 30%;
        height: 50%;
        top: 25%;
        left: 40%;
      }
      /* 모달 닫기 버튼?은 아니고 그냥 x자 */
      .close
      {
        color: gray;
        /* 맨 우측으로 */
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      /* 마우스가 위로 갔을때, 선택 되었을 때. */
      .close:hover,
      .close:focus
      {
        color: black;
        /* text-decoration: none; */
        /* 커서를 포인터로 바꿔서 버튼을 클릭하는 것 처럼. */
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <!--메뉴바, 채팅버튼 등 만들어둔 php파일 include-->
    <?php include '../title.php';?>
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
        <h2>발송 예약 리스트</h2>
        <ul>
          <li>2020.07.31 09:00, 01033339573, hi. it's modal test1.</li>
          <li>2020.07.31 10:00, 01033339573, hi. it's modal test2.</li>
          <li>2020.07.31 11:00, 01033339573, hi. it's modal test3.</li>
          <li>2020.07.31 12:00, 01033339573, hi. it's modal test4.</li>
          <li>2020.07.31 13:00, 01033339573, hi. it's modal test5.</li>
        </ul>
      </div>
    </div>

    <!--발송 모달 //평소에는 숨어있음 //타일을 클릭하면 그 옆에 뿅 나옴-->
    <div id="sentModal" class="modal">
      <!--모달 컨텐츠-->
      <div class="modal_content">
        <!--모달 닫기. x는 엔티티때문에 저렇게 써야함-->
        <span id="sent_modalClose" class="close">&times;</span>
        <!--테스트용 임시 리스트-->
<<<<<<< HEAD
        <h2>발송 완료 리스트</h2>
=======
>>>>>>> c86c9cd4461059f6557ccca91c96ecd802457e66
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
    <script type="text/javascript" src="cal_js.js"></script>
  </body>
</html>
