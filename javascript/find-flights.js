// Self invoking function
async function getFlights() {
    var connection = await fetch('momondo.php');
    var jData = await connection.json();
    // console.log(jData.schedule)
    var aOrderedSchedule = [];
    for (var i = 0; i < jData.schedule.length; i++) {
        // console.log('position in array', jData.schedule[i].order )
        aOrderedSchedule[jData.schedule[i].order] = jData.schedule[i]
    }

    var sDivsWithStops = '';
    for (var i = 0; i < aOrderedSchedule.length; i++) {
        var sFromDate = new Date(0);
        sFromDate.setUTCSeconds(aOrderedSchedule[i].date);
        sFromDate = sFromDate.toLocaleString('da-DK');
        sDivsWithStops += `
        <div>
          <img class="airline-icon" src="icons/${aOrderedSchedule[i].airlineIcon}">
          <div>FROM: ${aOrderedSchedule[i].from}</div>
          <div>DATE: ${sFromDate}</div>
        </div>`
    }
    document.getElementById('stops').innerHTML = sDivsWithStops;
    var jLastCity = aOrderedSchedule[aOrderedSchedule.length - 1];
    console.log(jLastCity);
    var sTo = `<div>Arrives at city: ${jLastCity.to}</div>`;
    // document.getElementById('stops').innerHTML += sTo
    document.getElementById('stops').insertAdjacentHTML('beforeend', sTo)
}
