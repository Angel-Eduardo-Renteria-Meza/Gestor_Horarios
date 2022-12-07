<?php
session_start();
//si esta esta definida permite que yo entre
if (isset($_SESSION['usuario'])) {
    include "header.php";
	$connection = mysqli_connect('localhost','root','','sgh');
// include_once("../clases/Conexion.php");
// $objeto=new conexion();
// $conexion=$objeto ->Conectar();
// $consulta="select horas_semana as horasSemana from descripcion_horarios where grupos='1A;B;C' and carrera='Tecnologias de la informacion'";
// $resultado=$conexion ->prepare($consulta);
// $resultado ->execute();
// $data=$resultado ->fetch();
include_once("../clases/conexion2.php");
include_once("../clases/datos.php");

?>
  <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap5.min.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<section id="inicio" align=center >
        <div class="contenido mt-5">
            <div class="presentacion">
                <p class="display-5">Bienvenido a:
                </p>
              <style>
              </style>
                <h2 class="display-1">Sistema gestor de horarios</h2>
                <div class="container">
			<p class="text-center mt-5 display-5">Gráficas informativas</p>
		</div>
 <hr>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="text-center">Horas de clase por carrera</h3>
					<canvas id="myChart"></canvas>
				</div>
                
				<div class="col-sm-6">
					<h3 class="text-center">Clases promedio por docente</h3>
					<canvas id="bars-graph"></canvas>
				</div>
                <hr>
                <hr>
				<div class="w-100"></div>
				<div class="col-sm-6">
					<h3 class="text-center">Horas por carrera</h3>
					<canvas id="pie-graph"></canvas>
				</div>
				<div class="col-sm-6">
					<h3 class="text-center">Clases activas</h3>
					<canvas id="doughnut-graph"></canvas>
				</div>
			</div>
		</div>
 
		<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
		<script>
	const labels = <?php echo json_encode($categoria)?>;
	const data = {
		labels: labels,
		datasets: [{
			label: 'Los numero son los identificadores de la carreras sigue en prueba el chartJS',
			data: <?php echo json_encode($tiempo) ?>,
			backgroundColor: [
			'rgba(255,99,132, 0.2)',
			'rgba(255,159,64, 0.2)',
			'rgba(0,192,192, 0.2)',
			'rgba(255,205,86, 0.2)',
			'rgba(54,162,235, 0.2)',
			'rgba(153,102,255, 0.2)',
			'rgba(116,216,88, 0.2)'
			],
			borderColor:[
			'rgba(255,99,132)',
			'rgba(255,159,64)',
			'rgba(0,192,192)',
			'rgba(255,205,86)',
			'rgba(54,162,235)',
			'rgba(153,102,255)',
			'rgba(116,216,88)'
			],
			borderWidth: 1
		}]
	};
	const config = {
		type: 'bar',
		data: data,
		options: {
			scales: {
				y:{
					beginAtZero: true
				}
			}
		},
	};
	var myChart = new Chart(
		document.getElementById('myChart'),
		config
	);
			// Bar Charts
			var barChartData = {
				labels: <?php echo json_encode($grupos)?>,
				datasets: [{
					label: "Clase por docente",
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1,
					data: <?php echo json_encode($horas)?>,
				}]
			};
			var ctx = document.getElementById("bars-graph").getContext("2d");
			var BarChart = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				responsive: true
			});
			// Data for pie chart
			var pieData = {
				labels: <?php echo json_encode($grupos)?>,
				datasets: [{
					data: <?php echo json_encode($horas) ?>,
					backgroundColor: [
						"#FF6384",
						"#36A2EB",
						"#FFCE56"
					],
					hoverBackgroundColor: [
						"#FF6384",
						"#36A2EB",
						"#FFCE56"
					]
				}]
			};
			var ctx = document.getElementById("pie-graph").getContext("2d");
			var PieChart = new Chart(ctx, {
				type: 'pie',
				data: pieData
			});
			// Data for doughnut chart
			var doughnutData = {
				labels: <?php echo json_encode($grupos)?>,
				datasets: [{
					data: <?php echo json_encode($horas) ?>,
					backgroundColor: [
						"#FF6384",
						"#36A2EB",
						"#FFCE56"
					],
					hoverBackgroundColor: [
						"#FF6384",
						"#36A2EB",
						"#FFCE56"
					]
				}]
			};
			var ctx = document.getElementById("doughnut-graph").getContext("2d");
			var DoughnutChart = new Chart(ctx, {
				type: 'doughnut',
				data: doughnutData,
				responsive: true
			});
		</script>
            </div>
        </div>
    </section>
<?php
    include "footer.php";
    //con el else indico que si ya se cerro sesion, redirija al index.php
}else{
    header("location:../seleccion_sistema");
}
?>
