
const selectTimeLapseContainer = document.querySelectorAll('.select-lapse-container');
const displayCustomDate = document.querySelector('.display-custom-date');
const timeLabel = document.querySelectorAll('.time-label');
const timeBox = document.querySelectorAll('.time-box');
const inputTime = document.querySelectorAll('.input-time');
// timeLpase function
function timeLapse(hour)
{
    const lapse=[];
    for(let i=8;i<=20;i+=hour)
    {
        lapse.push(`${i}-${i+hour}`);
    }
    return lapse;
}
// by default timelpase is set to be 1
// timeLapse(1);
// manual change by user
console.log(timeLapse(1))
timeLapse(1).forEach((lapse,index)=>{
    timeLabel[index].innerHTML=lapse;
    // set lapse as value of input tag
    inputTime[index].value = lapse;
    timeLabel[index].classList.add('active-time');
    // console.log(index)
});
selectTimeLapseContainer.forEach((lapseContainer,index)=>{
    lapseContainer.addEventListener('click',()=>{
       
        displayCustomDate.innerHTML=index+"HR";
        selectTimeLapseContainer.forEach(s=>{s.classList.remove('bg-gray-200');s.classList.replace('text-black','text-gray-500')});
        lapseContainer.classList.add('bg-gray-200');
        lapseContainer.classList.replace('text-gray-500','text-black') ;
        
        // removing active-time class from timelabel for detect to which time is stay visible
        timeLabel.forEach(tm=>tm.classList.remove('active-time'));
        // select time according to select time index    
        timeLapse(index).forEach((lapse,index)=>{
            timeLabel[index].innerHTML=lapse;
            inputTime[index].value = lapse;
            timeLabel[index].classList.add('active-time');  
            // console.log(index)
        });

// hide that time slots who have not contains active-time class
timeLabel.forEach((tm,index)=>{
    if(!tm.classList.contains('active-time'))
        timeBox[index].classList.add('hidden');
    else
        timeBox[index].classList.remove('hidden');
});
});
});

