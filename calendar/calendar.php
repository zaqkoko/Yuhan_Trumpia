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


      #sendtile
      {
        background-color: #BCF5A9;
        color: gray;
        /*visibility: hidden;*/
      }
      #senttile
      {
        background-color: #F5D0A9;
        color: gray;
        /*visibility: hidden;*/
      }
      /* 발송 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. */
      #sendtile:hover
      {
        color : black;
        font-size: 125.5%;
      }
      /* 발송 타일에 마우스 호버 했을때 글씨를 검정색으로. 폰트를 크게. */
      #senttile:hover
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
    <?php include '../title.php';?>
    <!--회원 이름 영역 //페이지 최상단 우측-->
    <div id="userLine">
      OOO님, 환영합니다.
      <!--로그아웃 버튼 //페이지 최상단 최우측-->
      <input type="button" name="logout" value="Log out">
    </div>

    <!--캡션 //달력의 위-->
    <div id="caption">
      <!--이전 달 선택 버튼, 이전 달 이벤트 연결-->
      <input type="button" name="leftButton" value="<" onclick="prevMonth()">
      <!--현재 년,월 표시 텍스트 //inline속성을 원해서 span사용-->
      <span id="YearMonthText">
      </span>
      <!--다음 달 선택 버튼, 다음 달 이벤트 연결-->
      <input type="button" name="rightButton" value=">" onclick="nextMonth()">
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
      <!--이하 각 일별 table row, table cell은 js로 자동출력-->
    </table>

    <!--메뉴바 //페이지 좌측 고정 // 하나로 고정해서 통일하기-->

    <!--채팅 버튼 //최우측 최하단//메뉴바와는 따로 떨어져있음-->


    <!--모달 //평소에는 숨어있음 //타일을 클릭하면 그 옆에 뿅 나옴-->
    <div id="sendModal" class="modal">
      <!--모달 컨텐츠-->
      <div class="modal_content">
        <!--모달 닫기. x는 엔티티때문에 저렇게 써야함-->
        <span class="close">&times;</span>
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
       //오늘 저장
       let today = new Date();
       // 오늘의 년도 저장
       let todayYear = today.getFullYear();
       // 오늘의 월 저장 (월은 0부터 시작이라 +1 해줘야 이번 달로 출력할 수 있음)
       let todayMonth = today.getMonth() + 1;
        // 테이블 id를 찾아서 그 요소를 변수에 넣어줌. 테이블을 컨트롤 할 수 있게 됨
       let calendar = document.getElementById("calendarTable");

       // 달력 생성 함수
       function buildCalendar()
       {
         // 이번달의 첫번째 날. 이번 년도, 이번 달, 1일을 저장 (과장님 첨삭. 출력해주는게 아니라서 getMonth에 +1을 안해야 이번 달이 됨.)
         let firstDate = new Date(today.getFullYear(), today.getMonth(),1);
         // 이번달의 마지막 날. 이번 년도, 다음 달, 0일을 저장 (이번 달 말일을 의미함)
         let lastDate = new Date(today.getFullYear(), today.getMonth()+1,0);
         // 요일. 이번달의 첫번째 날의 요일을 넣어줌. (일요일 = 0, ... 금요일 =5, 토요일=6.)
         let day = firstDate.getDay();
         // Math.ceil은 '올림'. getDate()의 반환 값은 몇일.(ex- 27일) 마지막날의 일을 7로 나누고 올림.  // 해당 달이 몇주인지 계산.
         let week = Math.ceil(lastDate.getDate()/7);
         // 캡션에 출력해 줄 YYYY년 MM월.
         let today_yearMonth = todayYear + "년 " + todayMonth + "월";
         // 각 라인에 삽입해줄 td가 앞으로 몇개 남았는지. ex) 각 셀 출력마다 leftDays를 -1 해줄때, leftDays가 현재 4라면 일,월,화의 출력을 끝 마친것.
         let leftDays = 7;
         // 각 td에 출력해줄 '일'.
         let setDays = 1;
         // 다음 달의 1일.
         let nextMonthDate = 1;
         // 발송건수 영역 디폴트는 안보이게(영역은 차지) 누르면 sendModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
         let sendTile = "<div id='sendtile'>send</div>";
         // 예약건수 영억 디폴트는 안보이게(영역은 차지) 누르면 sentModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
         let sentTile = "<div id='senttile'>sent</div>";
         // td내의 여백
         let spaceTile = "<div id='spacetile'><br></div>";

         //이번 달의 모든 week를 다 count 할때까지 돌린다 (4주짜리 달력이면 4번 반복실행)
         for(i = 0; i < week; i++)
         {
           // 캘린더 table에 tr을 넣음
           let row = calendar.insertRow();
           //이번달 첫번째 요일까지  ex) day가 4일때, 1주차 목요일까지 동작.
           while(day != 0)
           {
             // 셀 삽입. 공백 출력.
             row.insertCell().innerHTML = "";
             // 셀 삽입시마다 앞으로 삽입해 줄 빈 셀이 한개씩 줄어듬
             day -= 1;
             // 셀 삽입시마다 앞으로 삽입해 줄 td가 한개씩 줄어듬.
             leftDays -= 1;
           } // 1주의 지난 달까지 빈칸으로 출력
           //각 주마다 (leftDays가 0이 되면 1주가 끝난것.)
           while(leftDays != 0)
           {
             // 일이 이번 달의 마지막 날을 넘어가지 않으면
             if(setDays <= lastDate.getDate())
             {
               // 셀 삽입, 일 출력, 공백, 예약건수 타일, 발송건수 타일을 출력.
               row.insertCell().innerHTML =  setDays + spaceTile + sendTile + sentTile;
               // 일 ++
               setDays += 1;
               // 셀 삽입시마다 앞으로 삽입해 줄 td가 한개씩 줄어듬
               leftDays -= 1;
             }
             // 일이 이번 달을 넘어갔다면,
             else
             {
               // 셀 삽입. 다음 달의 일 출력. 타일은 출력하지 않음.
               row.insertCell().innerHTML = nextMonthDate;
               // 셀 삽입시마다 앞으로 삽입해 줄 td가 한개씩 줄어듬
               leftDays -= 1;
               // 다음 달의 일을 1씩 늘려줌
               nextMonthDate += 1;
             }
           }
           // 이번 주를 다 채웠으면 다음 채워줄 '다음주의 7일' 장전
           leftDays = 7;
         }
         /*
            문제 발생. 1일이 금요일이고 막일이 30일일 경우 || 1일이 토요일이고 막일이 31일일 경우,
            5번째 table row를 작성해야 함. (기존에는 4줄까지 출력되고 setDays 카운트가 멈춤)
            setDays가 막일까지 이르지 못했을 경우의 제어문 삽입
         */
         // 카운트가 멈춘 setDays를 1 줄여서 막일과 검사하고 출력시에 먼저 1을 올려줄것 (이거 안하면 웹페이지가 로드가 안됨)
         setDays -= 1;

         // 일이 막일까지 이르지 못했을 경우
         if(setDays != lastDate.getDate())
         {
           let row = calendar.insertRow();
           // 일이 막일에 이를 때 까지
           while(setDays != lastDate.getDate())
           {
             // 해당 주 계속 출력
             setDays++;
             leftDays--;
             row.insertCell().innerHTML = setDays + spaceTile + sendTile + sentTile;
           }
           // 마지막 주가 끝날 때 까지
           while(leftDays != 0)
           {
             // 다음 달 첫주 출력
             row.insertCell().innerHTML = nextMonthDate;
             nextMonthDate++;
             leftDays--;
           }
         }
         // 캡션에 년,월 출력
         document.getElementById("YearMonthText").innerHTML = today_yearMonth;
       }
       // 달력 생성 함수 실행.
       buildCalendar();

       // 이전,다음 달 버튼 클릭 시 동작하는 함수 내에서 기존 달력을 지우는 함수
       function deleteCalendar()
       {
         // 테이블 행이 0이 될 때 까지
         while(calendar.rows.length > 1)
         {
           // 테이블의 행을 지운다
           calendar.deleteRow(1);
         }
       }

       // 이전 달 버튼 클릭시 이전 달의 달력을 출력하는 함수
       function prevMonth()
       {
         // 캡션 출력용 전역변수로 지정한 todayMonth를 1 줄임
         todayMonth = todayMonth - 1;
         // 0월이란건 없으니까 todayMonth가 0이 되면
         if(todayMonth == 0)
         {
           // 지난 년도 12월로 변경해줌
           todayMonth = 12;
           todayYear -= 1;
         }
         // 기존 달력을 지우는 함수
         deleteCalendar();
         /*
            오늘에 이전 달을 저장한다
            todayMonth에 -1을 하는 이유는, 위에서 1 줄인 todayMonth는
            본래 today.getMonth() + 1 해준 상태라서 월이 0이 되는지 판단하기 위해 줄인 것임.
            실질적으로 today - 2를 하고 today에 새 객체로 넘겨줘야 이전 달을 출력 할 수 있게되는 것.
         */
         today = new Date(todayYear,todayMonth - 1);
         // 이전 달의 달력 출력 함수
         buildCalendar();
       }

       // 다음 달 버튼 클릭시 다음 달의 달력을 출력하는 함수
       function nextMonth()
       {
         // 캡션 출력용 전역변수로 지정한 todayMonth를 1 늘림
         todayMonth += 1;
         // 13월이란건 없으니까 todayMonth가 13이 되면
         if(todayMonth == 13)
         {
           // 다음 년도 1월로 변경해줌
           todayMonth = 1;
           todayYear = todayYear + 1;
         }
         // 기존 달력을 지우는 함수
         deleteCalendar();
         /* 오늘에 다음 달을 저장한다
            todayMonth에 -1을 하는 이유는, 위에서 1 늘인 todayMonth는
            본래 today.getMonth() + 1 해준 상태라서 월이 13이 되는지 판단하기 위해 줄인 것임.
            todayMonth를 그대로 today에 새 객체로 넘겨줘야 다음 달을 출력 할 수 있게되는 것.
         */
         today = new Date(todayYear, todayMonth - 1);
         // 다음 달의 달력 출력 함수
         buildCalendar();
       }

       // 모달을 저장
       let modal = document.getElementById('sendModal');
       // 타일을 저장
       let tile = document.getElementById("sendtile");
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

       /*  팝업창? 필요업음
        function sendPopup()
       {
         let url = "sendPopup.html";
         let name = "sendtile";
         let option = "width = '100px', height = '70px', top = '100px', left = '200px', location = no"

         window.open(url, name, option);
       }
       */
    </script> <!--참고한 링크 : https://hokeydokey.tistory.com/57 -->
  </body>
</html>
