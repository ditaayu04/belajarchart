<?php
include ('koneksi.php');

$label = mysqli_query($koneksi, "SELECT * FROM tb_covid LIMIT 10");

$country = array();
$totalcases = array();
$totaldeath = array();
$totalrecovered = array();
$activecases = array();
$totaltest = array();

while ($row = mysqli_fetch_array($label)) {
    $country[] = $row['country'];
    $totalcases[] = $row['totalcases'];
    $totaldeath[] = $row['totaldeath'];
    $totalrecovered[] = $row['totalrecovered'];
    $activecases[] = $row['activecases'];
    $totaltest[] = $row['totaltest'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pie doughnut Chart Covid-19</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px;height: 800px">
        <canvas id="pieChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <canvas id="doughnutChart"></canvas>
    </div>
<script>
    var ctxPie = document.getElementById("pieChart").getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                data: <?php echo json_encode($activecases);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                ],
            borderWidth: 1
        }]
    },
      options: {
        responsive: true,
            legend: {
                position: 'right'  
                }
            }
    });
    var ctxDoughnut = document.getElementById("doughnutChart").getContext('2d');
    var doughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                data: <?php echo json_encode($activecases);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                ],
            borderWidth: 1
        }]
    },
      options: {
        responsive: true,
            legend: {
                position: 'right'  
                }
            }
    });



    </script>
</body>
</html>