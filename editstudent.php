<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wcu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $inisiatif_strategik = $_POST['inisiatif_strategik'];
    $kpi = $_POST['kpi'];
    $peneraju = $_POST['peneraju'];
    $garis_dasar = $_POST['garis_dasar'];
    $y2024 = $_POST['y2024'];
    $y2025 = $_POST['y2025'];
    $y2026 = $_POST['y2026'];
    $y2027 = $_POST['y2027'];
    $y2028 = $_POST['y2028'];

    $sql = "UPDATE student SET inisiatif_strategik='$inisiatif_strategik', kpi='$kpi', peneraju='$peneraju', garis_dasar='$garis_dasar', y2024='$y2024', y2025='$y2025', y2026='$y2026', y2027='$y2027', y2028='$y2028' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: student.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Student Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        /* Form styling */
        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #1E90FF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Edit Data</h2>
<a href="#" class="go-back-btn" onclick="goBack()">
        <img src="icons/back.png" alt="Back Icon" class="back-icon">Go Back
    </a>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
<form action="editstudent.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="inisiatif_strategik">INISIATIF STRATEGIK:</label>
    <input type="text" name="inisiatif_strategik" value="<?php echo $row['inisiatif_strategik']; ?>">
    
    <label for="kpi">KPI:</label>
    <input type="text" name="kpi" value="<?php echo $row['kpi']; ?>">
    
    <label for="peneraju">PENERAJU:</label>
    <input type="text" name="peneraju" value="<?php echo $row['peneraju']; ?>">
    
    <label for="garis_dasar">GARIS DASAR:</label>
    <input type="text" name="garis_dasar" value="<?php echo $row['garis_dasar']; ?>">
    
    <label for="y2024">2024:</label>
    <input type="text" name="y2024" value="<?php echo $row['y2024']; ?>">
    
    <label for="y2025">2025:</label>
    <input type="text" name="y2025" value="<?php echo $row['y2025']; ?>">
    
    <label for="y2026">2026:</label>
    <input type="text" name="y2026" value="<?php echo $row['y2026']; ?>">
    
    <label for="y2027">2027:</label>
    <input type="text" name="y2027" value="<?php echo $row['y2027']; ?>">
    
    <label for="y2028">2028:</label>
    <input type="text" name="y2028" value="<?php echo $row['y2028']; ?>">
    
    <input type="submit" value="Update">
</form>

</body>
</html>

<?php
$conn->close();
?>
