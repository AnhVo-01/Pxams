const date = new Date();

const renderCalender = () =>{
    date.setDate(1);

    const monthDays = document.querySelector('.days');

    const lastDay = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();

    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

    const lastDayIndex = new Date(date.getFullYear(), date.getMonth()+1, 0).getDay();

    const nextDays = 7-lastDayIndex-1;

    const firstDayIndex = date.getDay();

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    $(".date h1").html(months[date.getMonth()]);
    $(".date p").html(new Date().toDateString())

    let days = "";

    for(let x=firstDayIndex; x>0; x--){
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for(let i=1; i<=lastDay; i++){
        if(i===new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<div class="today">${i}</div>`;
        }else{
            days += `<div>${i}</div>`;
        }
    }

    for(let j=1; j<=nextDays; j++){
        days += `<div class="next-date">${j}</div>`;
    }
    monthDays.innerHTML = days;
};

$(".prev").click(() => {
    date.setMonth(date.getMonth()-1);
    renderCalender();
})

$(".next").click(() => {
    date.setMonth(date.getMonth()+1);
    renderCalender();
})

renderCalender();
