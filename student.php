<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wcu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

function determineColor($value) {
    if (substr($value, -1) == "%" && intval(rtrim($value, "%")) < 70) {
        return "color: red;";
    }
    return "";
}

session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quality</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            margin: 40px auto;
            width: 80%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin-left: 250px;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #34495e;
            color: white;
            text-transform: uppercase;
            font-weight: normal;
        }

        td {
            background-color: #f7f9fc;
        }

        tr:hover td {
            background-color: #dfe7f1;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<main class="main-content">
        <div class="top-bar">
            <div class="search-container">
                <button class="search-btn">
                    <img src="icons/search.png" alt="Search" width="20" height="20">
                </button>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="user-info">
    <p class="text-light m-0 mr-2">Welcome <strong><?php echo $_SESSION['username']; ?></strong>!</p>
    <a href="index.php?logout='1'" style="margin-left: 6px" style="margin=top: 5px">
        <img src="icons/admin.png" alt="Admin Icon" style="width: 20px; height: auto;">
    </a>
</div>
        </div>

    <!-- BACK BUTTON SINI -->
    <a href="#" class="go-back-btn" onclick="goBack()">
        <img src="icons/back.png" alt="Back Icon" class="back-icon">Go Back
    </a>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    <!-- ATAS SINI -->

        <h2 class="fancy-title">Student Quality</h2>

    <table>
        <thead>
            <tr>
                <th>INISIATIF STRATEGIK</th>
                <th>KPI</th>
                <th>PENERAJU</th>
                <th>GARIS DASAR</th>
                <th>2024</th>
                <th>2025</th>
                <th>2026</th>
                <th>2027</th>
                <th>2028</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $firstRow = true;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    if ($firstRow) {
                        echo "<td rowspan='4' style='vertical-align:middle; text-align:center;'>" . $row["inisiatif_strategik"] . "</td>";
                        $firstRow = false;
                    }
                    echo "<td>" . $row["kpi"] . "</td>";
                    echo "<td>" . $row["peneraju"] . "</td>";
                    echo "<td style='" . determineColor($row["garis_dasar"]) . "'>" . $row["garis_dasar"] . "</td>";
                    echo "<td style='" . determineColor($row["y2024"]) . "'>" . $row["y2024"] . "</td>";
                    echo "<td style='" . determineColor($row["y2025"]) . "'>" . $row["y2025"] . "</td>";
                    echo "<td style='" . determineColor($row["y2026"]) . "'>" . $row["y2026"] . "</td>";
                    echo "<td style='" . determineColor($row["y2027"]) . "'>" . $row["y2027"] . "</td>";
                    echo "<td style='" . determineColor($row["y2028"]) . "'>" . $row["y2028"] . "</td>";
                    echo "<td><a href='editstudent.php?id=" . $row["id"] . "'><img src='icons/edit.png' alt='Edit' style='width:30px; height:auto;'></a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conn->close();
    ?>

<aside class="sidebar">
        <div class="logo">
            <img src="icons/unissalogo.png" alt="Logo"> <!-- Replace with your logo path -->
        </div>
        <hr>
        <ul class="menu">
            <li><a href="index.php"><img src="icons/dashboard.png" alt="Dashboard Icon"> Dashboard</a></li>
            <li><a href="academic-performance.html"><img src="icons/performance.png" alt="Performance Icon"> Academic Performance</a></li>
            <li><a href="survey-results.html"><img src="icons/survey.png" alt="Survey Icon"> Survey Results</a></li>
            <li><a href="financial-data.html"><img src="icons/cash-flow.png" alt="Financial Icon"> Financial Data</a></li>
        </ul>


        <div class="logout-container">
            <a href="index.php?logout='1'" class="logout-btn">
                <img src="icons/redlogout.png" alt="Logout"> <!-- Replace with your logout icon -->
                Logout
            </a>
        </div>
    </aside>

    <!-- CHART BAWAH -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>
<body>
    <div class="chart">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>

    <script>
window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Prestasi Inisiatif Strategik Sepanjang Tahun"
        },
        axisX: {
            title: "Tahun",
            interval: 1,
            intervalType: "year",
            valueFormatString: "YYYY",
            minimum: new Date(2024, 0),
            viewportMaximum: new Date(2028, 1, 5)
        },
        axisY: {
            title: "Peratus (%)",
            includeZero: true,
            suffix: "%",
            maximum: 130,
        },
        legend: {
            cursor: "pointer",
            fontSize: 18,
            itemclick: toggleDataSeries
        },
        toolTip: {
            shared: true
        },
        data: [
            {
                name: "Nisbah tenaga akademik dan pelajar",
                type: "spline",
                yValueFormatString: "#0.##'%'",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2024, 0), y: 7.69 },
                    { x: new Date(2025, 0), y: 7.69 },
                    { x: new Date(2026, 0), y: 8.33 },
                    { x: new Date(2027, 0), y: 9.09 },
                    { x: new Date(2028, 0), y: 10.00 }
                ]
            },
            {
                name: "% tenaga akademik yang mempunyai kelulusan PhD",
                type: "spline",
                yValueFormatString: "#0.##'%'",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2024, 0), y: 70 },
                    { x: new Date(2025, 0), y: 71 },
                    { x: new Date(2026, 0), y: 73 },
                    { x: new Date(2027, 0), y: 74 },
                    { x: new Date(2028, 0), y: 75 }
                ]
            },
            {
                name: "% tenaga akademik yang mengikuti latihan pembangunan profesional",
                type: "spline",
                yValueFormatString: "#0.##'%'",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2024, 0), y: 75 },
                    { x: new Date(2025, 0), y: 80 },
                    { x: new Date(2026, 0), y: 90 },
                    { x: new Date(2027, 0), y: 95 },
                    { x: new Date(2028, 0), y: 100 }
                ]
            },
            {
                name: "% tahap kepuasan pelajar terhadap pengajaran dan pembelajaran",
                type: "spline",
                yValueFormatString: "#0.##'%'",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2024, 0), y: 75 },
                    { x: new Date(2025, 0), y: 76 },
                    { x: new Date(2026, 0), y: 77 },
                    { x: new Date(2027, 0), y: 78 },
                    { x: new Date(2028, 0), y: 80 }
                ]
            }
        ]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}
</script>

</head>

</html>

</body>
</html>


<!-- SQL queries nya

CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inisiatif_strategik VARCHAR(255),
    kpi VARCHAR(255),
    peneraju VARCHAR(255),
    garis_dasar VARCHAR(50),
    y2024 VARCHAR(50),
    y2025 VARCHAR(50),
    y2026 VARCHAR(50),
    y2027 VARCHAR(50),
    y2028 VARCHAR(50)
);

random data bwh ani:
INSERT INTO student (inisiatif_strategik, kpi, peneraju, garis_dasar, y2024, y2025, y2026, y2027, y2028) VALUES
('1.1 Menyediakan tenaga akademik yang berkualiti tinggi dan kompeten', 'Nisbah tenaga akademik dan pelajar', 'Pendaftar & PR Akademik (HR, PPA & PPS)', '1:13', '1:13', '1:13', '1:12', '1:11', '1:10'),
('1.1 Menyediakan tenaga akademik yang berkualiti tinggi dan kompeten', '% tenaga akademik yang mempunyai kelulusan PhD', 'Pendaftar (HR)', '70%', '71%', '72%', '73%', '74%', '75%'),
('1.1 Menyediakan tenaga akademik yang berkualiti tinggi dan kompeten', '% tenaga akademik yang mengikuti latihan pembangunan profesional', 'Pendaftar & PR Akademik (HR & C4L)', '75%', '80%', '85%', '90%', '95%', '100%'),
('1.1 Menyediakan tenaga akademik yang berkualiti tinggi dan kompeten', '% tahap kepuasan pelajar terhadap pengajaran dan pembelajaran', 'PR PAP (PPPS)', '75%', '76%', '77%', '78%', '79%', '80%');
