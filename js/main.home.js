// el script para el timer del inicio

var today    = new Date(),
    election = new Date(2015, 5, 7),
    clock    = document.querySelector("#countdown"),
    timer, html, interval;


if(today < election){
  interval = setInterval(function(){
    var timespan = countdown(election);
    html = "<p>Faltan:" 
      +"<span class='number'><strong>" + timespan.days + "</strong></span> días "
      +"<span class='number'>" + timespan.hours + "</span> horas "
      +"<span class='number'>" + timespan.minutes + "</span> minutos "
      +"<span class='number'>" + timespan.seconds + "</span> segundos</p>";
    clock.innerHTML = html;

    if(!timespan.days && !timespan.hours && !timespan.minutes && timespan.seconds < 3){
      clearInterval(interval);
      clock.innerHTML = "YA YA YA !!!!!";
    }
  }, 1000);
}
else{
  clock.innerHTML = "";
}