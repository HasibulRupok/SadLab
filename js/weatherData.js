const showData = () =>{
    let data = sessionStorage.getItem('weatherInfo');
    data = JSON.parse(data);
    // console.log(data);
    const city = sessionStorage.getItem('name');

    document.getElementById("location").innerText = `${city} (${data.city['name']})`; 

    let htmlData = "";
    data.list.forEach(element => {
        const imageLink = `https://openweathermap.org/img/wn/${element.weather[0].icon}@2x.png`;
        const temp = parseFloat(element.main.temp) - 273.15;
        const feels = parseFloat(element.main.feels_like) - 273.15;
        htmlData += `
        <div class="weatherCard">
            <p class="DateTime">${element.dt_txt}</p>
            <img src="${imageLink}" alt="">
            <p>${temp.toFixed(2)}°C, Feels Like ${feels.toFixed(2)}°C</p>
            <h6>${element.weather[0].main}</h6>
            <p>${element.weather[0].description}</p> 
            <p>Wind ${element.wind.speed}KM/h, Humidity ${element.main.humidity}%</p> 
        </div>
        `;
    });

    document.getElementById("fullDiv").innerHTML = '';
    document.getElementById("fullDiv").innerHTML = htmlData;
}

showData();


document.getElementById("HomeBtn").addEventListener("click", function () {
    window.location = "../index.php";
});