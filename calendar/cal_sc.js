//currentTitle선언
var currentTitle = document.getElementById('current-year-month');
//calendarBody선언
var calendarBody = document.getElementById('calendar-body');
//today는 현재 날짜와 시간 받아옴
var today = new Date();
//first는 현재 년, 달, 1 받아옴
var first = new Date(today.getFullYear(), today.getMonth(),1);
var monthList = ['January','February','March','April','May','June','July','August','September','October','November','December'];
var leapYear=[31,29,31,30,31,30,31,31,30,31,30,31];
var notLeapYear=[31,28,31,30,31,30,31,31,30,31,30,31];
var pageFirst = first;
var pageYear;
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

    for(var i = 0; i < 6; i++)
    {
        var $tr = document.createElement('tr');
        $tr.setAttribute('id', monthCnt);
        for(var j = 0; j < 7; j++)
        {
            if((i === 0 && j < first.getDay()) || cnt > pageYear[first.getMonth()])
            {
                var $td = document.createElement('td');
                $tr.appendChild($td);
            }
            else
            {
                var $td = document.createElement('td');
                var $send = document.createElement('div');
                var $sent = document.createElement('div');
                $td.textContent = cnt;
                $td.appendChild($send);
                $td.appendChild($sent);
                $send.textContent = "send";
                $sent.textContent = "sent";
                $send.setAttribute('class', cnt);
                $send.setAttribute('id', 'sendTile');
                $sent.setAttribute('class', cnt);
                $sent.setAttribute('id', 'sentTile');
                // $td.setAttribute('id', cnt);
                $tr.appendChild($td);
                cnt++;
            }
        }
        monthCnt++;
        calendarBody.appendChild($tr);
    }

    currentTitle.innerHTML = first.getFullYear() + '&nbsp;' + monthList[first.getMonth()];
}

showCalendar();

function removeCalendar()
{
    let catchTr = 100;
    for(var i = 0; i< 6; i++)
    {
        var $tr = document.getElementById(catchTr);
        $tr.remove();
        catchTr++;
    }
}

function leftBtn()
{
    if(pageFirst.getMonth() === 1)
    {
          pageFirst = new Date(first.getFullYear()-1, 12, 1);
          first = pageFirst;
    }
    else
    {
          pageFirst = new Date(first.getFullYear(), first.getMonth()-1, 1);
          first = pageFirst;
    }
    // today = new Date(today.getFullYear(), today.getMonth()-1, today.getDate());
    removeCalendar();
    showCalendar();
}

function rightBtn()
{
    if(pageFirst.getMonth() === 12)
    {
        pageFirst = new Date(first.getFullYear()+1, 1, 1);
        first = pageFirst;
    }else
    {
        pageFirst = new Date(first.getFullYear(), first.getMonth()+1, 1);
        first = pageFirst;
    }
    // today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
    removeCalendar();
    showCalendar();
}
