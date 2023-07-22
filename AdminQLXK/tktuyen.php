<html>

<head>

    <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "qlbanvexe";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                    $sql="SELECT tuyenxe.TENTUYEN, COUNT(ID_CHUYENXE) as 'tongchuyenxe' from chuyenxe,tuyenxe 
                    WHERE chuyenxe.ID_TUYEN = tuyenxe.ID_TUYEN GROUP BY (tuyenxe.TENTUYEN)";
                    $result1 = $conn->query($sql);
                        $data=[];
                    //    while($row = mysqli_fetch_array($result1)){
                      //      $tuyen = $row['TENTUYEN'];
                        //   echo $tuyen;
                        //}
                       
      // echo "<pre>".var_dump($data)."</pre> ";
//============================================
                    
                ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php
    while($row = mysqli_fetch_array($result1)){
        $tuyen = $row['TENTUYEN'];
       $tong =$row['tongchuyenxe'];
       ?>['<?php echo $tuyen?>', <?php echo $tong?>],

            <?php
    }
    ?>

        ]);

        // Set chart options
        var options = {
            'title': 'Thống kê chuyến xe theo tuyến',
            'width': 400,
            'height': 300
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
</body>

</html>