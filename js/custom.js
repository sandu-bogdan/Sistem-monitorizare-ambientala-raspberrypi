$('#load_location').load('./data.php?type=location').fadeIn("slow");
$('#load_updates').load('./data.php?type=current-temp').fadeIn("slow");
$('#load_hum').load('./data.php?type=current-hum').fadeIn("slow");
$('#load_light').load('./data.php?type=current-light').fadeIn("slow");
$('#load_gas').load('./data.php?type=current-gas').fadeIn("slow");
$('#load_last_check').load('./data.php?type=last-check').fadeIn("slow");
$('#load_notification_count').load('./data.php?type=notification-count').fadeIn("slow");
fetch('./data.php?type=freq-value').then(res => res.json().then(obj => {
    var auto_refresh = setInterval(
        function (){
            $('#load_updates').load('./data.php?type=current-temp').fadeIn("slow");
            $('#load_last_check').load('./data.php?type=last-check').fadeIn("slow");
            $('#load_hum').load('./data.php?type=current-hum').fadeIn("slow");
            $('#load_light').load('./data.php?type=current-light').fadeIn("slow");
            $('#load_gas').load('./data.php?type=current-gas').fadeIn("slow");
            $('#load_notification_count').load('./data.php?type=notification-count').fadeIn("slow");
        }, obj * 1000);
    }))

//chart



$(document).ready(function () {
    showGraph()
    showGraphHum()
    showGraphLight()
    showGraphGas()
});


function showGraph() {
    fetch('./data.php?type=number-of-value-chart').then(res => res.json().then(numberOfValueChart => {
        document.querySelector("#chart-container").innerHTML = '<canvas id="graphCanvas"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
        constructGraph(numberOfValueChart);
    }))
    $('#graphCanvas').remove(); // this is my <canvas> element
     
}

function constructGraph(value) {
    $.post("./data.php?type=history-temp&value=" + value,
    function (data) {
        data = JSON.parse(data);
        var temp = [];
        var time = [];
        for (var i = 0; i < data.length; i++) {
            time.push(data[i].time);
            temp.push(data[i].temp); 
        }
        var chartdata = {
            labels: time,
            datasets: [
                {
                    label: 'Temperatura',
                    backgroundColor: '#ff595e',
                    borderColor: '#ff595e',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: temp
                }]
            };
            var graphTarget = $("#graphCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
                options:{
                    animations:{
                        animation: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: -50,
                                max: 100
                            }
                        }]
                    }
                }
            });
           
        });
    }

function showGraphHum() {
    fetch('./data.php?type=number-of-value-chart').then(res => res.json().then(numberOfValueChart => {
        document.querySelector("#chart-container-hum").innerHTML = '<canvas id="graphCanvasHum"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
        constructGraphHum(numberOfValueChart);
    }))
    $('#graphCanvasHum').remove(); // this is my <canvas> element
}

function constructGraphHum(value) {
    $.post("./data.php?type=history-hum&value=" + value,
    function (data) {
        data = JSON.parse(data);
        var hum = [];
        var time = [];
        for (var i = 0; i < data.length; i++) {
            time.push(data[i].time);
            hum.push(data[i].hum); 
        }
        var chartdata = {
            labels: time,
            datasets: [
                {
                    label: 'Umiditate',
                    backgroundColor: '#1982c4',
                    borderColor: '#1982c4',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: hum
                }]
            };
            var graphTarget = $("#graphCanvasHum");
           
            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
                options:{
                    animations:{
                        animation: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: 100
                            }
                        }]
                    }
                }
            });
           
        });
    }

function constructGraphLight(value) {
    $.post("./data.php?type=history-light&value=" + value,
        function (data) {
            data = JSON.parse(data);
            var light = [];
            var time = [];
            for (var i = 0; i < data.length; i++) {
                time.push(data[i].time);
                light.push(data[i].light); 
            }
            var chartdata = {
                labels: time,
                datasets: [
                    {
                        label: 'Lumina ambientala',
                        backgroundColor: '#36B9CC',
                        borderColor: '#36B9CC',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: light
                    }]
                };
                var graphTarget = $("#graphCanvasLight");
               
                var barGraph = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata,
                    options:{
                        animations:{
                            animation: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    stepSize: 1,
                                    beginAtZero: true,
                                    min: 0,
                                    max: 1,
                                    callback: function(value, index, ticks) {
                                        if(index==0) return 'Detectata'
                                        else
                                            return 'Netectata';
                                    }
                                }
                            }]
                        }
                    }
                });
               
            });
        }

function showGraphLight() {
            fetch('./data.php?type=number-of-value-chart').then(res => res.json().then(numberOfValueChart => {
                document.querySelector("#chart-container-light").innerHTML = '<canvas id="graphCanvasLight"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
                constructGraphLight(numberOfValueChart);
            }))
            $('#graphCanvasLight').remove(); // this is my <canvas> element
        }






function constructGraphGas(value) {
            $.post("./data.php?type=history-gas&value=" + value,
                function (data) {
                    data = JSON.parse(data);
                    var gas = [];
                    var time = [];
                    for (var i = 0; i < data.length; i++) {
                        time.push(data[i].time);
                        gas.push(data[i].gas); 
                    }
                    var chartdata = {
                        labels: time,
                        datasets: [
                            {
                                label: 'Detectie Gaz',
                                backgroundColor: '#F6C23E',
                                borderColor: '#F6C23E',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: gas
                            }]
                        };
                        var graphTarget = $("#graphCanvasGas");
                       
                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata,
                            options:{
                                animations:{
                                    animation: false
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            stepSize: 1,
                                            beginAtZero: true,
                                            min: 0,
                                            max: 1,
                                            callback: function(value, index, ticks) {
                                                if(index==0) return 'Detectata'
                                                else
                                                    return 'Netectata';
                                            }
                                        }
                                    }]
                                }
                            }
                        });
                       
                    });
                }




function showGraphGas() {
            fetch('./data.php?type=number-of-value-chart').then(res => res.json().then(numberOfValueChart => {
                document.querySelector("#chart-container-gas").innerHTML = '<canvas id="graphCanvasGas"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
                constructGraphGas(numberOfValueChart);
            }))
            $('#graphCanvasGas').remove(); // this is my <canvas> element
        }

//js config for datetimepicker history page
$('#date').datetimepicker({
    format: 'YYYY-MM-DD'
});


