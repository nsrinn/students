<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Database Table Display</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        table {
            max-width: 1400px;
        }

        .message-box {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <?php
        include 'data.php'; // Include your database connection file

        // ...

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['registerno'])) {
            $registerno = $_GET['registerno'];

            // Delete the record from the marks table
            $sqlMarks = "DELETE FROM marks WHERE registerno = ?";
            $stmtMarks = $conn->prepare($sqlMarks);
            $stmtMarks->bind_param("s", $registerno);

            if ($stmtMarks->execute()) {
                // Now, delete the record from the student table
                $sqlStudent = "DELETE FROM student WHERE registerno = ?";
                $stmtStudent = $conn->prepare($sqlStudent);
                $stmtStudent->bind_param("s", $registerno);

                if ($stmtStudent->execute()) {
                    // Record deleted successfully from both tables

                    ob_start();
                    include 'data.php'; // Assuming data.php generates the HTML for the table
                    $tableContent = ob_get_clean();

                    echo $tableContent;
                    header("Location: adminprofile.php");

                    // You can add a success message here if needed
                } else {
                    echo "Error deleting record from student table: " . $stmtStudent->error;
                }

                $stmtStudent->close();
            } else {
                echo "Error deleting record from marks table: " . $stmtMarks->error;
            }

            $stmtMarks->close();
        }

        // ...

        ?>
    </div>

</body>

</html>