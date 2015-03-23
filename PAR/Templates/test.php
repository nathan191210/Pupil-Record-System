<!DOCTYPE HTML>
    <html>
    <head>
    <script type="text/javascript" src="canvasjs.min.js"></script>
    <script type="text/javascript">
    window.onload = function () {
    var chart1 = new CanvasJS.Chart("chart1", {
    title:{
		text: "Progress of 2B"},
	data: [
    {
    type: "pie",
    dataPoints: [
    { x: 10, y: 10 },
    { x: 20, y: 15 },
    { x: 30, y: 25 },
    { x: 40, y: 30 },
    { x: 50, y: 28 }
    ]
    }
    ]
    });
    var chart2 = new CanvasJS.Chart("chart2", {
    title:{
		text: "Progress of 3B"},
	data: [
    {
    type: "pie",
    dataPoints: [
    { x: 10, y: 10 },
    { x: 20, y: 15 },
    { x: 30, y: 25 },
    { x: 40, y: 30 },
    { x: 50, y: 28 }
    ]
    }
    ]
    });
     
    chart2.render();
	chart1.render();
    }
    </script>
    </head>
         <div id="chart1" style="height: 200px; width: 100%;"></div> 
		<div id="chart2" style="height: 200px; width: 100%;"></div> 
     
    