<?php 
	//Checks if User is logged out
	session_start();
	if (isset($_SESSION['name'])==false or $_SESSION['name']==""){
		echo "<script>window.location.href='http://192.168.43.171';</script>";
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">


        <style>
            body {
                background-color: #faf2e4; 
                margin: 0 1%;
			    font-family: sans-serif;
		    }
            
            h1 {
                text-align: center;
			    font-family: 'Rubik Mono One',serif;
			    font-weight: normal; 
			    text-transform: uppercase; 
			    border-bottom: 4px solid #57b1dc; 
			    margin-top: 30px;
            }
            .col-md-10 {
                padding: 10px;
            }
        </style>


        <script>
            window.onload = function () {
                var dps1 = [];
                var dps2 = [];
                var dps3 = [];
                var dps4 = [];
                var chart1 = new CanvasJS.Chart("chartContainer1", {
                    //backgroundColor: "#4CAF50",
                    exportEnabled: true,
                    title :{
                        text: "LOCALITY 1"
                    },
                    axisX: {
                        title: "Time",
                        titleFontColor: "darkMagenta",
                        titleFontWeight: "bold",
                    },
                    axisY: {
                        includeZero: false,
                        title: "Concentration",
                        titleFontColor: "darkMagenta",
                        titleFontWeight: "bold",
                    },
                    toolTip: {
		                shared: true
	                },
	                legend: {
		                cursor: "pointer",
                        verticalAlign: "top",
                        horizontalAlign: "center",
                        dockInsidePlotArea: true,
                        itemclick: toogleDataSeries
                    },
                    data: [
                        {
                            type: "splineArea",
                            name: "L1",
		                    showInLegend: true,
                            lineThickness: 3,
                            color: "red",
                            fillOpacity: .2,
                            markerSize: 0,
                            dataPoints: dps1 
                        },
                        {
                            type: "splineArea",
                            name: "L2",
		                    showInLegend: true,
                            lineThickness: 3,
                            color: "seaGreen",
                            fillOpacity: .2,
                            markerSize: 0,
                            dataPoints: dps2 
                        },
                        {
                            type: "splineArea",
                            name: "L3",
		                    showInLegend: true,
                            markerSize: 0,
                            lineThickness: 3,
                            color: "dodgerBlue",
                            fillOpacity: .2,
                            dataPoints: dps3 
                        },
                        {
                            type: "splineArea",
                            name: "L4",
		                    showInLegend: true,
                            markerSize: 0,
                            lineThickness: 3,
                            color: "darkMagenta",
                            fillOpacity: .2,
                            dataPoints: dps4 
                    }]
                });
                var xVal = 0;
                var yVal = 100;
                var updateInterval = 2000;
                var dataLength = 50; // number of dataPoints visible at any point
                var updateChart1 = async function (count) {
                    count = count || 1;
                    // count is number of times loop runs to generate random dataPoints.
                    for (var j = 0; j < count; j++) {	
                        let url="http://192.168.43.171/webapi.php"
                        let response = await fetch(url);
                        let json= await response.json();
                        yVal = parseInt(json['enose']) ;
                        dps1.push({
                            x: xVal,
                            y: yVal
                        });
                        xVal++;
                    }
                    if (dps1.length > dataLength) {
                        dps1.shift();
                    }
                    chart1.render();
                };
                var updateChart2 = async function (count) {
                    count = count || 1;
                    // count is number of times loop runs to generate random dataPoints.
                    for (var j = 0; j < count; j++) {	
            
                        let url="http://192.168.43.171/webapi.php"
                        let response = await fetch(url);
                        let json= await response.json();
                        yVal = parseInt(json['enose']) ;
                        dps2.push({
                            x: xVal,
                            y: yVal
                        });
                        xVal++;
                    }
                    if (dps2.length > dataLength) {
                        dps2.shift();
                    }
        
                    chart2.render();
                };
                var updateChart3 = async function (count) {
                    count = count || 1;
                    // count is number of times loop runs to generate random dataPoints.
                    for (var j = 0; j < count; j++) {	
                        let url="http://192.168.43.171/webapi.php"
                        let response = await fetch(url);
                        let json= await response.json();
                        yVal = parseInt(json['enose']) ;
                        dps3.push({
                            x: xVal,
                            y: yVal
                        });
                        xVal++;
                    }
                    if (dps3.length > dataLength) {
                        dps3.shift();
                    }
                    chart3.render();
                };
                var updateChart4 = async function (count) {
                    count = count || 1;
                    // count is number of times loop runs to generate random dataPoints.
                    for (var j = 0; j < count; j++) {	
                        let url="http://192.168.43.171/webapi.php"
                        let response = await fetch(url);
                        let json= await response.json();
                        yVal = parseInt(json['enose']) ;
                        dps4.push({
                            x: xVal,
                            y: yVal
                        });
                        xVal++;
                    }
                    if (dps4.length > dataLength) {
                        dps4.shift();
                    }
                    chart4.render();
                };
                updateChart1(dataLength); 
                updateChart2(dataLength);
                updateChart3(dataLength);
                updateChart4(dataLength);
                setInterval(function(){ 
                    updateChart1();
                    updateChart2();
                    updateChart3();
                    updateChart4();
                }, 
                updateInterval); 
            }
            function toogleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        </script>


    </head>

    <body style="background: url('background.jpg'); background-blend-mode: multiply; background-repeat: no-repeat; background-size: cover;">
        <h1>GARBAGE ACCUMULATION DATA</h1>
        <div class="container-fluid">
			<div class="row">
            <a href="single_bin.php" class="btn btn-info" role="button" style="margin:0px auto;">Go to Single Bin</a>
			<a href="logout.php" class="btn btn-danger" role="button" style="margin:0px auto;">Logout</a>
			</div>
        </div>
        
        <div class="container-fluid">
	        <div class="row" style="padding: 7px 0px;">
            <div class ="col-md-10 offset-md-1 offset-lg-1 col-lg-10">
                    <div id="chartContainer1" style="height: 400px; width:100%; padding: 30px 5px;"></div>
                </div>
            </div>
        </div>


        <!--Container Fluid for the Bin Name Displays-->
		<div class="container-fluid" style="padding-top: 30px;">
			<div class="row">
				<div class="col-sm-12 col-md-6" style="text-align: center;" id="bad">
				<h3>Bins Needing Cleaner</h3>
				</div>
				<div class="col-sm-12 col-md-6" style="text-align: center;" id="good">
				<h3>Bins That Are Okay</h3>
				</div>
			</div>
		</div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
    </body>
</html>
