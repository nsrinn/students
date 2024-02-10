

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-center mt-5 m-5 text-uppercase" style="color: #155724;">Update Marks</h1>
        <form action="" method="post">

            <div class="form-group mb-5 col-md-10 mx-auto">
                <?php
                include 'data.php';

                $errors = array();

                // Fetch marks based on registration number
                $regno = isset($_GET['registerno']) ? $_GET['registerno'] : '';
                if (empty($regno)) {
                    echo "<div class='alert alert-danger'>Registration number is missing.</div>";
                    exit; // Exit if registration number is missing
                }

                $sql = "SELECT id, registerno, english, hindi, physics, chemistry, biology, geography, history, computer_science, extra_activities, total_marks FROM marks WHERE registerno ='$regno'";
                $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

                if (mysqli_num_rows($resultset) > 0) {
                    $rows = mysqli_fetch_assoc($resultset);
                    $updatedTotalMarks = isset($rows['total_marks']) ? $rows['total_marks'] : 0; // Set initial total marks
                } else {
                    echo "<div class='alert alert-danger'>No marks found for this registration number</div>";
                    exit; // Exit if no marks found
                }

                $subjects = ["english", "hindi", "physics", "chemistry", "biology", "geography", "history", "computer_science", "extra_activities"];

                // Display the table with marks and grades
                echo "<h4 class='col-md-10 mx-auto'>Student Marks Table</h4>";
                echo "<table class='table col-md-10 mx-auto'>";
                echo "<thead><tr><th>Subject</th><th>Marks</th><th>Grade</th></tr></thead>";
                echo "<tbody>";
                foreach ($subjects as $subject) {
                    echo "<tr>";
                    echo "<td>" . ucfirst($subject) . "</td>";
                    echo "<td>";
                    $subjectValue = isset($rows[$subject]) ? $rows[$subject] : '';
                    echo "<input type='text' class='form-control' name='$subject' value='$subjectValue' placeholder='Out of 100'>";
                    if (!empty($errors[$subject])) {
                        echo "<span class='text-danger'>" . $errors[$subject] . "</span>";
                    }
                    echo "</td>";
                    echo "<td>";
                    $subjectValue = isset($rows[$subject]) ? $rows[$subject] : ''; // Default value if not set
                    if (is_numeric($subjectValue)) {
                        $mark = (int) $subjectValue;
                        echo calculateGrade($mark);
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<tr><td><b style='color: red;'>Total Marks</b></td><td><b>$updatedTotalMarks</b></td><td></td></tr>";
                echo "<tr><td colspan='3'><button type='submit' class='btn btn-primary my-3 mx-2 text-center' style='background-color: #155724; border:1px solid #155724;'>Update</button>";
                echo "<button class='btn btn-danger my-3 text-center'><a href='adminprofile.php' style='text-decoration: none; color:white'>Back to dashboard</a></button></td></tr>";
                echo "</tbody></table>";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Form is submitted
                    $regno = test_input($regno);

                    $stmt = $conn->prepare("SELECT english, hindi, physics, chemistry, biology, geography, history, computer_science, extra_activities, total_marks FROM marks WHERE registerno = ?");
                    $stmt->bind_param("s", $regno);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $existingMarks = $result->fetch_assoc();
                        $updatedTotalMarks = isset($existingMarks['total_marks']) ? $existingMarks['total_marks'] : 0;
                    } else {
                        echo "<div class='alert alert-danger'>No marks found for this registration number</div>";
                        exit; // Exit if no marks found
                    }

                    $subjects = ["english", "hindi", "physics", "chemistry", "biology", "geography", "history", "computer_science", "extra_activities"];

                    // Calculate total marks from existing marks
                    $totalMarks = 0;
                    foreach ($subjects as $subject) {
                        if (isset($existingMarks[$subject])) {
                            $totalMarks += $existingMarks[$subject];
                        }
                    }

                    // Update marks and calculate new total marks
                    foreach ($subjects as $subject) {
                        if (!empty($_POST[$subject])) {
                            $mark = $_POST[$subject];

                            if (!is_numeric($mark)) {
                                $errors[$subject] = "Invalid marks. Please enter a numeric value.";
                            } elseif ($mark < 0 || $mark > 100) {
                                $errors[$subject] = "Invalid marks. Marks should be between 0 and 100.";
                            } else {
                                // Valid numeric mark
                                $mark = (int)$mark;

                                // Subtract the existing mark from total marks
                                if (isset($existingMarks[$subject])) {
                                    $totalMarks -= $existingMarks[$subject];
                                }

                                // Update the mark in the database
                                $stmt = $conn->prepare("UPDATE marks SET $subject = ? WHERE registerno = ?");
                                $stmt->bind_param("ss", $mark, $regno);
                                $stmt->execute();
                                $stmt->close();

                                // Add the new mark to total marks
                                $totalMarks += $mark;
                            }
                        }
                    }

                    // Update the total marks in the database
                    $stmt = $conn->prepare("UPDATE marks SET total_marks = ? WHERE registerno = ?");
                    $stmt->bind_param("ss", $totalMarks, $regno);
                    $stmt->execute();
                    $stmt->close();

                    $updatedTotalMarks = $totalMarks;

                    // Calculate grade for each subject
                    foreach ($subjects as $subject) {
                        if (!empty($_POST[$subject])) {
                            $mark = (int)$_POST[$subject];
                            $grade = calculateGrade($mark);
                        }
                    }
                }

                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                function calculateGrade($mark)
                {
                    switch (true) {
                        case $mark > 100:
                            return 'Out of 100';
                        case $mark >= 90:
                            return 'A+';
                        case $mark >= 80:
                            return 'A';
                        case $mark >= 70:
                            return 'B+';
                        case $mark >= 60:
                            return 'B';
                        case $mark >= 50:
                            return 'C+';
                        case $mark >= 40:
                            return 'C';
                        case $mark >= 25:
                            return 'D';
                        default:
                            return 'Fail';
                    }
                }
                ?>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
