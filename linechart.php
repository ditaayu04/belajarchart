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
    <title>Line Chart Covid-19</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 1000px;height: 1000px">
        <canvas id="myChart"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [
            {
                label: 'Total Cases',
                data: <?php echo json_encode($totalcases); ?>,
                borderWidth: 1,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)'
            },
            {
                label: 'Total Death',
                data: <?php echo json_encode($totaldeath); ?>,
                borderWidth: 1,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)'
            }, 
            {
                label: 'Total Recovered',
                data: <?php echo json_encode($totalrecovered); ?>,
                borderWidth: 1,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)'
            },
            {
                label: 'Active Cases',
                data: <?php echo json_encode($activecases); ?>,
                borderWidth: 1,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)'
            },
            {
                label: 'Total Test',
                data: <?php echo json_encode($totaltest); ?>,
                borderWidth: 1,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)'
            }
        ]
      },
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
         }
       }    
    });
    </script>
</body>
</html>