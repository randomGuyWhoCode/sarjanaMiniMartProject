<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://googleapis.com" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/echarts@6.0.0/dist/echarts.min.js"></script>
    <title>Sarjana Minimart</title>
</head>
<body>
    <?php include("sidebar.php"); staffNav()?>
    
    <div class="side-margin">
        <img src="
        <?php
        session_start();
        echo $_SESSION['profile_pic'];
        ?>" alt="profile image"
         /> 
        <div class="header">
            <h1 >Staff Dashboard</h1>
            <p>Hello Adam!</p>
        </div>

        <section class="info-cards">
            <div class="info-card">Total Staff: 12</div>
            <div class="info-card">Total Registered Customer: 210</div>
            <div class="info-card">Amount Of Sales: 23</div>
        </section>

        <div class="graph" id="sales" ></div>
        <div class="graph" id="sales2"></div>
    <script type="text/javascript">
      var myChart = echarts.init(document.getElementById('sales'));
      var myChart2 = echarts.init(document.getElementById('sales2'));

      
      const option = {
            title: {
                text: 'Amount of Sales',
                left: 'center'
            },
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: ['Mineral Water', 'Vico', 'Apollo', 'Indomie', 'Colgate Toothbrush', 'Panadol'],
                axisLabel: {
                interval: 0
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                name: 'Sales',
                type: 'bar',
                data: [25, 5, 10, 36, 15, 20], 
                itemStyle: {
                    color: '#4169E1' 
                }
                }
            ]
        };

        const option2 = {
            title: {
            text: 'Amount of Sales',
            subtext: 'By Product',
            left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c} ({d}%)' 
            },
            legend: {
                orient: 'vertical',
                left: 'left',
            },
            series: [
                {
                name: 'Sales',
                type: 'pie',
                radius: '60%',
                data: [
                    { value: 15, name: 'Mineral Water' },
                    { value: 5, name: 'Vico' },
                    { value: 10, name: 'Apollo' },
                    { value: 36, name: 'Indomie' },
                    { value: 8, name: 'Colgate Toothbrush' },
                    { value: 12, name: 'Panadol' }
                ],
                emphasis: {
                    itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
        };

      myChart.setOption(option);
      myChart2.setOption(option2);
    </script>


    </div>    
</body>
</html>