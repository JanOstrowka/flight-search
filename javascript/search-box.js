async function getFlightData() {
    let jConnection = await fetch('api/get-flights-data.php')


}

async function getCitites(){


    if( txtSearch.value.length == 0 ){
        results.style.display = 'none';
        return // Return means take me out of the function
    }
    var sSearchFor = txtSearch.value;
    var url = 'api-city-search.php?cityName='+sSearchFor;
    var connection = await fetch(url);
    // console.log(response) // 200
    var sData = await connection.text();
    console.log(sData); // text
    var jData = JSON.parse(sData); // convert text into object
    var sDivCities = ''; // <div>X</div><div>Y</div>
    for(var i = 0; i < jData.cities.length; i++ ){
        // Concatanate
        sDivCities += `<div onclick="selectCity(this)">${jData.cities[i].name}</div>`
    }
    // Overwrite results
    results.innerHTML = sDivCities;
    results.style.display = 'block'
}


function selectCity(objectDOM){
    var sCityName = objectDOM.innerHTML;
    txtSearch.value = sCityName;
    results.style.display = "none"
}
