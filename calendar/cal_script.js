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
    // 첫번째 날 = 이번 년의, 이번 달의, 1일
    let firstDate = new Date(today.getFullYear(), today.getMonth(), 1);
    // 첫번째 날의 요일. 셀의 각 번호에 대치했을때 1일이 시작되는 셀 번호.(반환값이 0부터이므로 편의성을 위해 1을 더해줌)
    let firstDay = firstDate.getDay() + 1;
    // 마지막 날 = 이번 년의, 다음 달의, 0일
    let lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    // 마지막 날의 일자 반환. dayCount가 lastDay를 넘어가면 이번달이 끝난것이니 다음 셀부터는 회색 칠해주자
    let lastDay = lastDate.getDate();
    // 발송건수 영역 디폴트는 안보이게(영역은 차지) 누르면 sendModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
    let sendTile = "<div class='sendtile' id='";
    let sendTile2 = "'>send</div>"
    // 예약건수 영억 디폴트는 안보이게(영역은 차지) 누르면 sentModal을 띄우게. 내용은 db에서 받아온 후 출력하게 하기
    let sentTile = "<div class='senttile' id='";
    let sentTile2 = "'>sent</div>"
    // td내의 여백
    let spaceTile = "<div class='spacetile'></div>";
    // 달력의 모든 셀을 하나씩 카운트
    for (i = 1; i < 43; i++)
    {
        // 해당 셀이 첫번째 날 이후에 해당되고, 일 변수가 마지막 날까지 카운트될때
        if (i >= firstDay && dayCount <= lastDay)
        {
            // i번째 셀 선택
            let thisDay = document.getElementById(i);
            if(dayCount >= 10)
            {
                if(month>= 9)
                {
                    let ymd = year + "-" + (month+1) + "-" + dayCount;
                    thisDay.innerHTML = dayCount + spaceTile + sendTile + ymd + sendTile2 + sentTile + ymd + sentTile2;
                    dayCount++;
                }
                else
                {
                    let ymd = year + "-0" + (month+1) + "-" + dayCount;
                    thisDay.innerHTML = dayCount + spaceTile + sendTile + ymd + sendTile2 + sentTile + ymd + sentTile2;
                    dayCount++;
                }
            }
            else
            {
                if(month>= 9)
                {
                    let ymd = year + "-" + (month+1) + "-0" + dayCount;
                    thisDay.innerHTML = dayCount + spaceTile + sendTile + ymd + sendTile2 + sentTile + ymd + sentTile2;
                    dayCount++;
                }
                else
                {
                    let ymd = year + "-0" + (month+1) + "-0" + dayCount;
                    thisDay.innerHTML = dayCount + spaceTile + sendTile + ymd + sendTile2 + sentTile + ymd + sentTile2;
                    dayCount++;
                }
            }
            // i번째 셀에 일과 타일을 삽입
        }
        else
        {
            // 이전달, 다음달 영역에 해당되는 셀은
            let goneDay = document.getElementById(i);
            // 회색으로 칠해준다
            goneDay.style.background = "#fff";
        }
    }
    // 1일이 토요일이고 막일이 30일 이상이거나, 1일이 금요일이고 막일이 31일이면
    if ((firstDay == 7 && lastDay >= 30) || (firstDay == 6 && lastDay == 31))
    {
        // 6주의 table row를
        let judge = document.getElementById("sixthWeek");
        // 보여준다
        judge.style.display = "table-row";
    }
    // 그게 아니면
    else
    {
        // 6주의 table row를
        let judge = document.getElementById("sixthWeek");
        // 안보여준다
        judge.style.display = "none";
    }
      /* -----------여기부터는 모달------------- */
    // 예약 모달을 껏다 켯다 해줄거임 변수에 저장
    let d_modal = document.getElementById("sendModal");
    // 예약 모달의 닫기 버튼을 저장 // id로 가져오면 왜 오류뜨지?
    let d_btn = document.getElementsByClassName("close")[0];
    // 예약 타일을 저장. 요부분 어케해야할지 고쳐보자 // calendarClear 함수에서 했던거 응용해보기? // 고침
    let d_tiles = document.getElementsByClassName("sendtile");
    // 예약 타일들을 넣어줄 배열
    let d_tile = new Array();
    // 발송 모달을 껏다 켯다 해줄거임 변수에 저장
    let t_modal = document.getElementById("sentModal");
    // 발송 모달의 닫기 버튼을 저장 // id로 가져오면 왜 오류뜨지?
    let t_btn = document.getElementsByClassName("close")[1];
    // 발송 타일을 저장. 요부분 어케해야할지 고쳐보자 // calendarClear 함수에서 했던거 응용해보기? // 고침
    let t_tiles = document.getElementsByClassName("senttile");
    // 발송 타일들을 넣어줄 배열
    let t_tile = new Array();
    // 타일들의 길이만큼 반복
    for (i = 0; i < d_tiles.length; i++)
    {
        // d_tiles의 i번째 요소를 d_tile에 넣고
        d_tile[i] = d_tiles[i];
        // 클릭했을때 예약 모달 디스플레이 나오게  이벤트리스너 넣음
        d_tile[i].addEventListener("click", function tileClick()
        {
            d_modal.style.display = "block";
            $.ajax
            ({
                //signup_idcheck.php에 연결
                url: "cal_db.php",
                //id가 id인 값이 data
                data:
                {
                  id : $(this).attr('id'),
                },
                //post메소드를 이용하여 url에 요청
                type: "POST",
                //ajax요청이 완료되면
              }).success(function (data)
                {
                    alert(data);
                });
        });
        // t_tiles의 i번째 요소를 t_tile에 넣고
        t_tile[i] = t_tiles[i];
        // 클릭했을때 발송 모달 디스플레이 나오게  이벤트리스너 넣음
        t_tile[i].addEventListener("click", function tileClick()
        {
            t_modal.style.display = "block";
            $.ajax
            ({
                //signup_idcheck.php에 연결
                url: "cal_db.php",
                //id가 id인 값이 data
                data:
                {
                  id : $(this).attr('id'),
                },
                //post메소드를 이용하여 url에 요청
                type: "POST",
                //ajax요청이 완료되면
              }).success(function (data)
                {
                    alert(data);
                });

        });
    };
    // 이벤트 리스너 넣을때 인수 1,2 넣어서 1이면 d모달 2면 t모달 열어주려 했으나  안됨.
    // 예약 모달의 close 버튼을 클릭하면
    d_btn.onclick = function ()
    {
    // 예약 모달의 display 속성을 none으로 변경. 안보이게 된다.
        d_modal.style.display = "none";
    };
    // 발송 모달의 close 버튼을 클릭하면
    t_btn.onclick = function ()
    {
    // 발송 모달의 display 속성을 none으로 변경. 안보이게 된다.
        t_modal.style.display = "none";
    };
    /* ----------- 모달 끝 ------------- */
}
// 달력 출력 끝~
// 달력 클리어해주는 함수     !됏당!
function calendarClear()
{
    // 모든 셀을 tds에 넣어줌 (nodelist? 엘리멘트 집합? 배열같은거인듯)
    let tds = document.getElementsByTagName("td");
    // 모든 셀의 길이만큼 반복
    for (i = 0; i < tds.length; i++)
    {
        // tds의 i번째 요소를 td에 넣고
        let td = tds[i];
        // 그 i번째 td를 clear 해준다
        td.innerHTML = "";
        // 배경이 회색으로 칠해졌을수 있으니 없애준다 (이거 하얀색 등으로 색 지정해버리면 호버 안먹힘. 공백을 넣어줘야함)
        td.style.background = "";
    }
}
// 이전 달 버튼 클릭시 이전 달의 달력을 출력하는 함수
function leftBtn()
{
    // 캡션 출력용 전역변수로 지정한 todayMonth를 1 줄임
    month = month - 1;
    // 0월이란건 없으니까 todayMonth가 -1이 되면(반환값이 0부터니까)
    if (month == -1)
    {
        // 지난 년의 12월로 변경해줌
        month = 11;
        year -= 1;
    }
    // 기존 달력을 지우는 함수
    calendarClear();
    // 변경한 년,월을 today에 저장
    today = new Date(year, month);
    // 이전 달의 달력 출력 함수
    calendarPrint();
}
// 다음 달 버튼 클릭시 다음 달의 달력을 출력하는 함수
function rightBtn()
{
    // 캡션 출력용 전역변수로 지정한 todayMonth를 1 늘림
    month = month + 1;
    // 13월이란건 없으니까 todayMonth가 12가 되면(반환값이 0부터니까)
    if (month == 12)
    {
        // 다음 년의 1월로 변경해줌
        month = 0;
        year += 1;
    }
    // 기존 달력을 지우는 함수
    calendarClear();
    // 변경한 년,월을 today에 저장
    today = new Date(year, month);
    // 이전 달의 달력 출력 함수
    calendarPrint();
}
