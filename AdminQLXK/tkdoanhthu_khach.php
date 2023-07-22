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

                    $sql="SELECT  khachhang.EMAIL,sum(phieudatve.TongTien*1000) as doanhthu FROM khachhang,phieudatve
                    WHERE khachhang.EMAIL=phieudatve.EMAIL
                    GROUP BY khachhang.EMAIL
                    ORDER by doanhthu DESC
                    LIMIT 5";
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
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Doanh Thu", {
                role: "style"
            }],
            <?php
    while($row = mysqli_fetch_array($result1)){
        $email = $row['EMAIL'];
       $tong =$row['doanhthu'];
       ?>['<?php echo $email?>', <?php echo $tong?>, "#76A7FA"],

            <?php
    }
    ?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Top 5 khach hang co doanh thu cao nhất",
            width: 500,
            height: 380,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
    </script>

</head>

<body>
    <!--Div that will hold the pie chart-->
    <div id="barchart_values" style="width: 8800px; height: 300px;"></div>
</body>

</html>