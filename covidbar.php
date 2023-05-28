<?php
include('koneksi2.php');
$label =
["India","Japan","S.Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];
for($id_covid = 1;$id_covid < 11; $id_covid++){
$query = mysqli_query($koneksi,"select SUM(totalcases) AS totalcases from tb_covid where id_covid='$id_covid'");
$row = $query->fetch_array();
$jumlah_produk[] = $row['totalcases'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Grafik Covid  - Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
                label: 'Grafik Total Cases Covid-19',
                data: <?php echo json_encode($jumlah_produk); ?>,
                borderWidth: 1
            }]
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