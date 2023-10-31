<?php
// Start the output buffer
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teras Strategik 1</title>
    <style>
        /* Styles for the table */
        table {
            border-collapse: collapse;
            margin: 0 auto; /* center the table */
            width: 80%; /* table width */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1E90FF;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Teras Strategik 1</h2>

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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="4">1.1<br>Menyediakan tenaga akademik yang berkualiti tinggi dan kompeten</td>
                <td>Nisbah tenaga akademik dan pelajar</td>
                <td>Pendaftar & PR Akademik (HR, PPA & PPS)</td>
                <td>1:13</td>
                <td>1:13</td>
                <td>1:13</td>
                <td>1:12</td>
                <td>1:11</td>
                <td>1:10</td>
            </tr>
            <tr>
                <td>% tenaga akademik yang mempunyai kelulusan PhD</td>
                <td>Pendaftar (HR)</td>
                <td>70%</td>
                <td>71%</td>
                <td>72%</td>
                <td>73%</td>
                <td>74%</td>
                <td>75%</td>
            </tr>
            <tr>
                <td>% tenaga akademik yang mengikuti latihan pembangunan profesional</td>
                <td>Pendaftar & PR Akademik (HR & C4L)</td>
                <td>75%</td>
                <td>80%</td>
                <td>85%</td>
                <td>90%</td>
                <td>95%</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>% tahap kepuasan pelajar terhadap pengajaran dan pembelajaran</td>
                <td>PR PAP (PPPS)</td>
                <td>75%</td>
                <td>76%</td>
                <td>77%</td>
                <td>78%</td>
                <td>79%</td>
                <td>80%</td>
            </tr>
        </tbody>
    </table>

</body>
</html>

<?php
// End the output buffer and send the HTML to the browser
echo ob_get_clean();
?>

