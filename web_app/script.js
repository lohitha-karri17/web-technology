const body = document.querySelector("body"),
  hourHand = document.querySelector(".hour"),
  minuteHand = document.querySelector(".minute"),
  secondHand = document.querySelector(".second");


const updateTime = () => {
  let date = new Date(),
    sec = (date.getSeconds() / 60) * 360,
    min = (date.getMinutes() / 60) * 360,
    hr = (date.getHours() / 12) * 360;

  secondHand.style.transform = `rotate(${sec}deg)`;
  minuteHand.style.transform = `rotate(${min}deg)`;
  hourHand.style.transform = `rotate(${hr}deg)`;
};

setInterval(updateTime, 1000);
updateTime();
