<?php
// test: booking_date => date_of_use
$dataChart = [];
foreach ($revenue as $key => $value) {
    foreach ($value as $key1 => $value1) {
        if ($key1 == 'total_price') {
            $dataChart[$key][$key1] = $value1;
        }
        if ($key1 == 'date_of_use') {
            $month = explode("-", $value1)[1];
            $month = (int) $month;
            $dataChart[$key][$key1] = $month;
            $year = explode("-", $value1)[0];
            $year = (int) $year;
            $dataChart[$key]['year'] = $year;
        }
    }
}
for ($i = 0; $i < count($dataChart); $i++) {
    for ($j = $i + 1; $j < count($dataChart); $j++) {
        if (
            $dataChart[$i]['date_of_use'] == $dataChart[$j]['date_of_use']
            && $dataChart[$i]['year'] == $dataChart[$j]['year']
        ) {
            $dataChart[$i]['total_price'] += $dataChart[$j]['total_price'];
            array_splice($dataChart, $j, 1);
            $j = $i;
        }
    }
}

$dataChartYear = [];
foreach ($revenueYear as $key => $value) {
    foreach ($value as $key1 => $value1) {
        if ($key1 == 'total_price') {
            $dataChartYear[$key][$key1] = $value1;
        }
        if ($key1 == 'date_of_use') {
            $year = explode("-", $value1)[0];
            $year = (int) $year;
            $dataChartYear[$key]['year'] = $year;
        }
    }
}
for ($i = 0; $i < count($dataChartYear); $i++) {
    for ($j = $i + 1; $j < count($dataChartYear); $j++) {
        if ($dataChartYear[$i]['year'] == $dataChartYear[$j]['year']) {
            $dataChartYear[$i]['total_price'] += $dataChartYear[$j]['total_price'];
            array_splice($dataChartYear, $j, 1);
            $j = $i;
        }
    }
}
// echo '<pre>';
// print_r($dataChartYear);
// echo '</pre>';
?>
<?php
$old = getFlashData('old');
$yearSta = 2024;
?>
<form action="<?php echo _HOST_PATH_ ?>/admin/Statistics/" method="post" class="mb-3 mt-3 ms-3">
    <h4>Thời gian thống kê</h4>
    <div class="mb-3 d-flex w-50">
        <div class="timeSta w-50 me-3"">
            <label for=" date_of_use">Ngày bắt đầu</label>
            <input value="<?php if (isset($old['dateStart'])) {
                                echo $old['dateStart'];
                            } ?>" type="date" name="dateStart" id="" class="form-control"">
        </div>
        <div class=" timeSta w-50"">
            <label for="date_of_use">Ngày kết thúc</label>
            <input value="<?php if (isset($old['dateEnd'])) {
                                echo $old['dateEnd'];
                            } ?>" type="date" name="dateEnd" id="" class="form-control"">
        </div>
    </div>
    <button type=" submit" class="btn btn-primary px-3 py-2 fw-bold text-light">Thống kê </button>
            <a href=" <?php echo _HOST_PATH_ ?>/admin/Statistics/" class="me-3 px-3 py-2 fw-bold text-light btn btn-danger">
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </a>
</form>

<!-- revenue - variation-->
<div class="" style="margin-bottom: 5rem;">
    <h3 class="text-center text-primary">Doanh thu <?php echo "$timeSearch" ?></h3>
    <table class="table table-bordered text-center table-striped border-primary" style="margin: auto;">
        <thead class="table-primary">
            <th width="3%">STT</th>
            <th>Tháng</th>
            <th>Doanh thu(VNĐ)</th>
        </thead>

        <tbody>
            <?php
            $model = new Model();
            if (!empty($dataChart)) {
                foreach ($dataChart as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <!-- <?php
                                if ($key % 3 == 0) {
                                    echo '<td rowspan="3" style="text-align: center; vertical-align: middle;">1</td>';
                                }
                                ?> -->
                        <td><?php echo $value['date_of_use'] ?></td>
                        <td><?php echo number_format($value['total_price'], 0, ",", ".") ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="11" class="text-primary">Không có số liệu thống kê</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex">
        <div class="revenue mt-3 me-3 w-50">
            <h4 class="text-center text-primary">Biểu đồ doanh thu</h4>
            <div class="chart-box w-100">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="variation mt-3 w-50">
            <h4 class="text-center text-primary">Biến động doanh thu</h4>
            <div class="chart-box w-100">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- revenue - percent -->

<!-- percent -->
<div class="d-flex " style="margin-bottom: 5rem;">
    <div class="m-auto ms-0 w-50" style="height: 20%;">
        <h3 class="text-center text-primary">Doanh thu theo loại vé <?php echo "$timeSearch" ?></h3>
        <table class="table table-bordered text-center table-striped border-primary m-auto ms-0 w-100 h-100">
            <thead class="table-primary">
                <th width="3%">STT</th>
                <th>Loại vé</th>
                <th>Số lượng</th>
                <th>Doanh thu(VNĐ)</th>
            </thead>

            <tbody>
                <?php
                $model = new Model();
                if (!empty($typeTicketChar)) {
                    foreach ($typeTicketChar as $key => $value) {
                        $x = (int)$value['price'] * 1000 * $value['count'];
                ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['ticket_name'] ?></td>
                            <td><?php echo $value['count'] ?></td>
                            <td><?php echo number_format($x, 0, ",", ".") ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="11" class="text-primary">Không có số liệu thống kê</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="percent mt-3" style="width: 35%;">
        <h4 class="text-center text-primary">Biểu đồ tỉ lệ loại vé được bán <?php echo "$timeSearch" ?></h4>
        <div class="chart-box d-flex justify-content-center m-auto w-100">
            <canvas id="myChart1"></canvas>
        </div>
    </div>
</div>
<!-- percent -->

<!-- Statistic by year -->

<form action="<?php echo _HOST_PATH_ ?>/admin/Statistics/" method="post" class="mb-3 mt-3 ms-3">
    <h4>Thời gian thống kê</h4>
    <select name="yearSta" id="" class="form-control mb-3" style="width: 20%">
        <option class="text-center" value="">---- Chọn năm thống kê ---</option>
        <!-- <option class="text-center" value="2023">2023</option>
        <option class="text-center" value="2024">2024</option> -->
        <?php 
            if(!empty($dataChartYear)) {
                foreach($dataChartYear as $key => $value) { 
                        ?>
                        <option class="text-center" value="<?php echo $value['year'] ?>"><?php echo $value['year'] ?></option>
                        <?php 
                }
            }
        ?>
    </select>
    <button type=" submit" class="btn btn-primary px-3 py-2 fw-bold text-light">Thống kê </button>
    <a href=" <?php echo _HOST_PATH_ ?>/admin/Statistics/" class="me-3 px-3 py-2 fw-bold text-light btn btn-danger">
        <i class="fa-solid fa-rotate-left"></i>
        Reset
    </a>
</form>
<div class="" style="margin-bottom: 5rem;">
    <h3 class="text-center text-primary">Doanh thu các năm</h3>
    <table class="table table-bordered text-center table-striped border-primary" style="margin: auto;">
        <thead class="table-primary">
            <th width="3%">STT</th>
            <th>Năm</th>
            <th>Doanh thu(VNĐ)</th>
        </thead>
        <tbody>
            <?php
            if (!empty($dataChartYear)) {
                foreach ($dataChartYear as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $value['year'] ?></td>
                        <td><?php echo number_format($value['total_price'], 0, ",", ".") ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="11" class="text-primary">Không có số liệu thống kê</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex">
        <div class="revenue mt-3 me-3 w-50">
            <h4 class="text-center text-primary">Biểu đồ doanh thu các năm</h4>
            <div class="chart-box w-100">
                <canvas id="myChart3"></canvas>
            </div>
        </div>
        <div class="variation mt-3 w-50">
            <h4 class="text-center text-primary">Biến động doanh thu các năm</h4>
            <div class="chart-box w-100">
                <canvas id="myChart4"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Statistic by year -->



<!-- Tạo biểu đồ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
<!-- revenue -->
<script>
    const labels = ['1', '2', '3', '4', '5', '6 ',
        '7', '8', '9', '10', '11', '12'
    ];
    // const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6 ',
    //     'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
    // ];
    let dataChart = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var i = 0;
    <?php
    foreach ($dataChart as $value) {
    ?>
        dataChart.splice(<?php echo ($value['date_of_use'] - 1) ?>, 1, <?php echo $value['total_price'] ?>);
    <?php
    }
    ?>
    const data = {
        labels: labels,
        datasets: [{
            label: 'Doanh thu',
            data: dataChart,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Tháng'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (VNĐ)'
                    }
                }
            },
        },
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
<!-- revenue -->

<!-- percent -->
<script>
    let labelDChart = [];
    let dataDChart = [];
    <?php
    foreach ($typeTicketChar as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == 'ticket_name') {
    ?>
                labelDChart.push(<?php echo '"' . $value1 . '"' ?>)
            <?php
            } else if ($key1 == 'count') {
            ?>
                dataDChart.push(<?php echo $value1 ?>)
    <?php
            }
        }
    }
    ?>
    const data1 = {
        labels: labelDChart,
        datasets: [{
            label: 'Số lượt bán',
            data: dataDChart,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };
    const config1 = {
        type: 'doughnut',
        data: data1,
    };
    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
</script>
<!-- percent -->

<!-- variation -->
<script>
    let labelLChart = [];
    let dataLChart = [];
    const data2 = {
        labels: labels,
        datasets: [{
            label: 'Doanh thu',
            data: dataChart,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    const config2 = {
        type: 'line',
        data: data2,
        scales: {
            x: {
                beginAtZero: false,
                title: {
                    display: true,
                    text: 'Tháng'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Doanh thu (VNĐ)'
                }
            }
        },
    };
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
</script>
<!-- variation -->



<!-- Statistic by year -->
<script>
    const labelsYear = [];
    let dataChartYear = [];
    var i = 0;
    <?php
    foreach ($dataChartYear as $value) {
    ?>
        dataChartYear.push(<?php echo ($value['total_price'] - 1) ?>)
        labelsYear.push(<?php echo ($value['year']) ?>)
    <?php
    }
    ?>
    const dataYear = {
        labels: labelsYear,
        datasets: [{
            label: 'Doanh thu',
            data: dataChartYear,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const configYear = {
        type: 'bar',
        data: dataYear,
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Năm'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (VNĐ)'
                    }
                }
            },
        },
    };
    const myChartYear = new Chart(
        document.getElementById('myChart3'),
        configYear
    );
</script>

<script>
    const data4 = {
        labels: labelsYear,
        datasets: [{
            label: 'Doanh thu',
            data: dataChartYear,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    const config4 = {
        type: 'line',
        data: data4,
        scales: {
            x: {
                beginAtZero: false,
                title: {
                    display: true,
                    text: 'Năm'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Doanh thu (VNĐ)'
                }
            }
        },
    };
    const myChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
    );
</script>

<!-- Statistic by year -->