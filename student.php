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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quality</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            margin: 40px auto;
            width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
    <h2 style="text-align:center;">Quality Student</h2>

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
