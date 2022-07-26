  
$(document).ready(function () {
    showCustomDateTemp()
    showCustomDateHum()
    showCustomDateLight();
    showCustomDateGas();
});

function showCustomDateTemp() {

    fetch('./data.php?type=custom-date-temp&value=all&date='+date).then(res => res.json().then(customDateTemp => {
        document.querySelector("#chart-container").innerHTML = '<canvas id="graphCanvas"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
        constructGraph(customDateTemp);
    }))
    $('#graphCanvas').remove(); // this is my <canvas> element
     
}

function constructGraph(value) {
    $.post("./data.php?type=custom-date-temp&value=all&date="+date,
    function (data) {
        data = JSON.parse(data);
        var temp = [];
        var time = [];
        var date = [];
        for (var i = 2; i < data.length; i++) {
            time.push(data[i].time + ' '+ data[i].date);
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



    function showCustomDateHum() {
        fetch('./data.php?type=custom-date-hum&value=all&date='+date).then(res => res.json().then(historyValueHum => {
            document.querySelector("#chart-container-hum").innerHTML = '<canvas id="graphCanvasHum"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
            constructGraphHum(historyValueHum);
        }))
        $('#graphCanvasHum').remove(); // this is my <canvas> element
    }
    
    function constructGraphHum(value) {
        $.post("./data.php?type=custom-date-hum&value=all&date=" + date,
        function (data) {
            data = JSON.parse(data);
            var hum = [];
            var time = [];
            var date = [];
            for (var i = 2; i < data.length; i++) {
                time.push(data[i].time + ' '+ data[i].date);
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



        function showCustomDateLight() {
            fetch('./data.php?type=custom-date-light&value=all&date='+date).then(res => res.json().then(historyValueTemp => {
                document.querySelector("#chart-container-light").innerHTML = '<canvas id="graphCanvasLight"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
                constructGraphLight(historyValueTemp);
            }))
            $('#graphCanvasLight').remove(); // this is my <canvas> element
        }


        function constructGraphLight(value) {
            $.post("./data.php?type=custom-date-light&value=all&date=" + date,
                function (data) {
                    data = JSON.parse(data);
                    var light = [];
            var time = [];
            var date = [];
            for (var i = 2; i < data.length; i++) {
                time.push(data[i].time + ' '+ data[i].date);
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


                        
        function showCustomDateGas() {
            fetch("./data.php?type=custom-date-gas&value=all&date="+date).then(res => res.json().then(historyValueTemp => {
                document.querySelector("#chart-container-gas").innerHTML = '<canvas id="graphCanvasGas"></canvas>'; //destroy and reload canvas, solve bug ghosting chart
                constructGraphGas(historyValueTemp);
            }))
            $('#graphCanvasGas').remove(); // this is my <canvas> element
        }
        
                function constructGraphGas(value) {
                    $.post("./data.php?type=custom-date-gas&value=all&date=" + date,
                        function (data) {
                            data = JSON.parse(data);
                            var gas = [];
                            var time = [];
                            var date = [];
                            for (var i = 2; i < data.length; i++) {
                                time.push(data[i].time + ' '+ data[i].date);
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
        
        
        
