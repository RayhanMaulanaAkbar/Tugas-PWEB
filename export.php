<?php

include 'config.php';

// Tell the browser that this is an Excel file
header("Content-Type: application/vnd.ms-excel");

// Tell the browser to download the file
header("Content-Disposition: attachment; filename=Laporan_Mahasiswa.xls");

header("Pragma: no-cache");
header("Expires: 0");

// Get all students
$result = mysqli_query(
    $conn,
    "SELECT * FROM students ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Laporan Mahasiswa</title>

</head>

<body>

    <table border="1">

        <thead>

            <tr>

                <th>No</th>

                <th>NIM</th>

                <th>Nama</th>

                <th>Jurusan</th>

            </tr>

        </thead>

        <tbody>

            <?php

            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";

                echo "<td>{$no}</td>";

                echo "<td>'{$row['nim']}</td>";

                echo "<td>{$row['name']}</td>";

                echo "<td>{$row['major']}</td>";

                echo "</tr>";

                $no++;
            }

            ?>

        </tbody>

    </table>

</body>

</html>