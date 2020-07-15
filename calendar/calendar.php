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
      /* 예약 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. */
      .sendtile:hover
      {
        color : black;
        font-size: 125.5%;
      }
      /* 발송 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. */
      .senttile:hover
      {
        color : black;
        font-size: 125.5%;
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

    <!--모달 //평소에는 숨어있음 //타일을 클릭하면 그 옆에 뿅 나옴-->
    <div id="sendModal" class="modal">
      <!--모달 컨텐츠-->
      <div class="modal_content">
        <!--모달 닫기. x는 엔티티때문에 저렇게 써야함-->
        <span class="close">&times;</span>
        <!--테스트용 임시 리스트-->
        <ul>
          <li>2020.07.14 09:00, 01033339573, hi. it's modal test1.</li>
          <li>2020.07.14 10:00, 01033339573, hi. it's modal test2.</li>
          <li>2020.07.14 11:00, 01033339573, hi. it's modal test3.</li>
          <li>2020.07.14 12:00, 01033339573, hi. it's modal test4.</li>
          <li>2020.07.14 13:00, 01033339573, hi. it's modal test5.</li>
        </ul>
      </div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript">
      /*
        나만의 달력을 만들어 보자
        이번에는 테이블 셀을 모두 만들어놓고
        그 셀에 내용들을 채운다
        그러면 매번 셀을 다시 만들 필요가 없지 않을까?
        6주 row는 on off한다
      */
      // 전역 변수들~
      // 현재 모든 시간 today에 저장
      let today = new Date();
      // 캡션에 출력할 오늘의 년도 4자리 저장
      let year = today.getFullYear();
      // 캡션에 출력할 오늘의 월 저장
      let month = today.getMonth();
      // calendar 변수로 테이블 제어할 수 있게 연결
      let calendar = document.getElementById("calendarTable");

      // 달력을 출력해주는 함수 실행
      calendarPrint();

      // 달력 출력 함수
      function calendarPrint()
      {
        // 캡션에 출력할 year month를 yyyymm에 넣음. (month는 0부터 시작이라 1 더해줌)
        let yyyymm = year + "년 " + (month + 1) + "월";
        // 캡션에 년월 출력
        document.getElementById("YearMonthText").innerHTML = yyyymm;
        // 셀에 출력해줄 일 변수. 1씩 올릴거임
        let dayCount = 1;
        // 일 변수를 어디서부터 채워야하는지 알아야한다 == 이번달의 1일이 시작하는 날의 요일
        // 첫번째 날 = 이번 년의, 이번 달의, 1일
        let firstDate = new Date(today.getFullYear(), today.getMonth(), 1);
        // 첫번째 날의 요일. 셀의 각 번호에 대치했을때 1일이 시작되는 셀 번호.(반환값이 0부터이므로 편의성을 위해 1을 더해줌)
        let firstDay = firstDate.getDay() + 1;
        // 마지막 날 = 이번 년의, 다음 달의, 0일
        let lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        // 마지막 날의 일자 반환. dayCount가 lastDay를 넘어가면 이번달이 끝난것이니 다음 셀부터는 회색 칠해주자
        let lastDay = lastDate.getDate();
        // 발송건수 영역 디폴트는 안보이게(영역은 차지) 누르면 sendModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
        let sendTile = "<div class='sendtile'>send</div>";
        // 예약건수 영억 디폴트는 안보이게(영역은 차지) 누르면 sentModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
        let sentTile = "<div class='senttile'>sent</div>";
        // td내의 여백
        let spaceTile = "<div class='spacetile'><br></div>";
        // 달력의 모든 셀을 하나씩 카운트
        for(i = 1; i < 43; i++)
        {
          // 해당 셀이 첫번째 날 이후에 해당되고, 일 변수가 마지막 날까지 카운트될때
          if(i >= firstDay && dayCount <= lastDay)
          {
            // i번째 셀 선택
            let thisDay = document.getElementById(i);
            // i번째 셀에 일과 타일을 삽입
            thisDay.innerHTML = dayCount + spaceTile + sendTile + sentTile;
            // 일을 1 늘림
            dayCount++;
          }
          else
          {
            // 이전달, 다음달 영역에 해당되는 셀은
            let goneDay = document.getElementById(i);
            // 회색으로 칠해준다
            goneDay.style.background = '#D8D8D8';
          }
        }
        // 1일이 토요일이고 막일이 30일 이상이면, 1일이 금요일이고 막일이 31일이면
        if(firstDay == 7 && lastDay >= 30 || firstDay == 6 && lastDay == 31)
        {
          // 6주의 table row를
          let judge = document.getElementById('sixthWeek');
          // 보여준다
          judge.style.display = 'table-row';
        }
        // 그게 아니면
        else
        {
          // 6주의 table row를
          let judge = document.getElementById('sixthWeek');
          // 안보여준다
          judge.style.display = 'none';
        }
      }

      // 달력 클리어해주는 함수
      function calendarClear()
      {
        // 모든 셀을 선택
        //let selectAll = document.getElementsByTagName('td');
        // 모든 셀의 내용과 효과를 없앰
        //selectAll.innerHTML = "";
        //selectAll.style.background = 'white';
      }

      // 이전 달 버튼 클릭시 이전 달의 달력을 출력하는 함수
      function leftBtn()
      {
        // 캡션 출력용 전역변수로 지정한 todayMonth를 1 줄임
        month = month - 1;
        // 0월이란건 없으니까 todayMonth가 -1이 되면(반환값이 0부터니까)
        if(month == -1)
        {
          // 지난 년의 12월로 변경해줌
          month = 11;
          year -= 1;
        }
        // 기존 달력을 지우는 함수
        calendarClear();
        // 변경한 년,월을 today에 저장
        today = new Date(year,month);
        // 이전 달의 달력 출력 함수
        calendarPrint();
      }

      // 다음 달 버튼 클릭시 이전 달의 달력을 출력하는 함수
      function rightBtn()
      {
        // 캡션 출력용 전역변수로 지정한 todayMonth를 1 줄임
        month = month + 1;
        // 13월이란건 없으니까 todayMonth가 12가 되면(반환값이 0부터니까)
        if(month == 12)
        {
          // 다음 년의 1월로 변경해줌
          month = 0;
          year += 1;
        }
        // 기존 달력을 지우는 함수
        calendarClear();
        // 변경한 년,월을 today에 저장
        today = new Date(year,month);
        // 이전 달의 달력 출력 함수
        calendarPrint();
      }

      // 여기부터는 모달~
      // 모달을 저장
      let modal = document.getElementById('sendModal');
      // 타일을 저장. 요부분 html컬렉션으로 어케해야할지 고쳐보자
      let tile = document.getElementsByClassName("sendtile");
      // 첫번째 닫기 버튼을 저장
      let btn = document.getElementsByClassName("close")[0];

      // sendtile을 클릭하면
      tile.onclick = function()
      {
       // 모달의 display 속성을 block으로 변경. 보이게 된다.
       modal.style.display = "block";
      }
       // close 버튼을 클릭하면
      btn.onclick = function()
      {
       // 모달의 display 속성을 none으로 변경. 안보이게 된다.
       modal.style.display = "none";
      }
       // 모달의 반투명한 부분을 클릭하면
      window.onclick = function(event)
      {
       if (event.target == modal)
       {
        // 모달의 display 속성을 none으로 변경. 안보이게 된다.
        modal.style.display = "none";
       }
      }
      // 모달 끝~
    </script>
  </body>
</html>
