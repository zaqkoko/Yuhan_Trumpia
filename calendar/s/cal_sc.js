//currentTitle선언
var currentTitle = document.getElementById('current-year-month');
//calendarBody선언
var calendarBody = document.getElementById('calendar-body');
//today는 현재 날짜와 시간 받아옴
var today = new Date();
//first는 현재 년, 달, 1 받아옴
var first = new Date(today.getFullYear(), today.getMonth(),1);
//monthList
var monthList = ['January','February','March','April','May','June','July','August','September','October','November','December'];
var leapYear=[31,29,31,30,31,30,31,31,30,31,30,31];
var notLeapYear=[31,28,31,30,31,30,31,31,30,31,30,31];
var pageFirst = first;
var pageYear;

//윤년 구별
if(first.getFullYear() % 4 === 0)
{
    pageYear = leapYear;
}
else
{
    pageYear = notLeapYear;
}

function showCalendar()
{
    let monthCnt = 100;
    let cnt = 1;
    //6번 반복
    for(var i = 0; i < 6; i++)
    {
        //$tr은 tr요소를 추가하는거로 정의
        var $tr = document.createElement('tr');
        //tr의 id를 monthCnt로
        $tr.setAttribute('id', monthCnt);
        //7번 반복
        for(var j = 0; j < 7; j++)
        {
            //첫 행에서 요일이 j값보다 클때 또는 월의 수보다 cnt가 많을때
            if((i === 0 && j < first.getDay()) || cnt > pageYear[first.getMonth()])
            {
                //$td는 td요소를 추가하는거로 정의
                var $td = document.createElement('td');
                //$tr에 $td를 추가
                $tr.appendChild($td);
            }
            else
            {
                var $td = document.createElement('td');
                //$send, $sent는 div요소를 추가하는거라고 정의
                var $send = document.createElement('div');
                var $sent = document.createElement('div');
                var $sendday = document.createElement('span');
                //td에 cnt를 넣는다
                $td.textContent = cnt;
                //td에 $send, $sent 추가
                $td.appendChild($send);
                $td.appendChild($sent);
                //$send, sent에 내용
                $send.textContent = "send";
                $sent.textContent = "sent";
                //$send, $sent는의 클래스와 아이디를 지정
                $send.setAttribute('class', 'sendTile');
                $send.setAttribute('id', cnt);
                //$send.setAttribute('onclick', 'sendC();');
                $sent.setAttribute('class', 'sentTile');
                $sent.setAttribute('id', cnt);
                //$sent.setAttribute('onclick', 'sentC();');
                // $td.setAttribute('id', cnt);
                $tr.appendChild($td);
                cnt++;
            }
        }
        //monthCnt 1 +
        monthCnt++;
        //calendarBody에 자식 객체?로 밑에 tr요소추가
        calendarBody.appendChild($tr);
    }
    //currentTitle에 innerHTML로 연도와 공백과 달을 입.력
    currentTitle.innerHTML = first.getFullYear() + '&nbsp;' + monthList[first.getMonth()];

}

//함수실행
showCalendar();

function removeCalendar()
{
    //monthCnt랑 맞춰야 하므로 100으로 시작
    let catchTr = 100;
    //6번 반복
    for(var i = 0; i< 6; i++)
    {
        //id가 catchTR인거를 $tr이라함 (위에 달력만드는 함수에서 monthCnt와 일치할것)
        var $tr = document.getElementById(catchTr);
        //지움
        $tr.remove();
        catchTr++;
    }
}

function leftBtn()
{
    //1월이면
    if(pageFirst.getMonth() === 1)
    {
        //연도를 -1하고 12월로, 이걸 first로 지정
          pageFirst = new Date(first.getFullYear()-1, 12, 1);
          first = pageFirst;
    }
    else
    {
        //월을 -1하고 이걸 first로 지정
          pageFirst = new Date(first.getFullYear(), first.getMonth()-1, 1);
          first = pageFirst;
    }
    // today = new Date(today.getFullYear(), today.getMonth()-1, today.getDate());
    //달력지우고
    removeCalendar();
    //달력만들고
    showCalendar();
}

function rightBtn()
{
    //12월일때
    if(pageFirst.getMonth() === 12)
    {
        //연도를 +1하고 1월로,  이걸 first로 지정
        pageFirst = new Date(first.getFullYear()+1, 1, 1);
        first = pageFirst;
    }else
    {
        //월을 +1하고 이걸 first로 지정
        pageFirst = new Date(first.getFullYear(), first.getMonth()+1, 1);
        first = pageFirst;
    }
    // today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
    //달력지우고
    removeCalendar();
    //달력만들고
    showCalendar();
}

//modal과 닫는 버튼 지정
let d_modal = document.getElementById("sendModal");
let t_modal = document.getElementById("sentModal");
let d_btn = document.getElementsByClassName("close")[0];
let t_btn = document.getElementsByClassName("close")[1];
let d_tile = document.getElementByClassName("sendTile");
let t_tile = document.getElementByClassName("sentTile");
let d_tiles = new Array();
let t_tiles = new Array();

for (i = 0; i < d_tile.length; i++)
{
  d_tiles[i] = d_tile[i];
  // 클릭했을때 예약 모달 디스플레이 나오게  이벤트리스너 넣음
  d_tiles[i].addEventListener("click", function tileClick() {
    d_modal.style.display = "block";
  });
  // t_tiles의 i번째 요소를 t_tile에 넣고
  t_tiles[i] = t_tile[i];
  // 클릭했을때 발송 모달 디스플레이 나오게  이벤트리스너 넣음
  t_tiles[i].addEventListener("click", function tileClick() {
    t_modal.style.display = "block";
  });
}
//버튼을 클릭하면 modal이 다시 안보이게 되는 함수들
d_btn.onclick = function ()
{
  d_modal.style.display = "none";
};

t_btn.onclick = function ()
{
  t_modal.style.display = "none";
};
