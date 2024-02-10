<?php
include 'data.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['registerno'])) {
    $regno = $_GET['registerno'];
    $subjects = ["english", "hindi", "physics", "chemistry", "biology", "geography", "history", "computer_science", "extra_activities"];

    // Fetch student details
    $sqlStudent = "SELECT * FROM student WHERE registerno = ?";
    $stmtStudent = $conn->prepare($sqlStudent);
    $stmtStudent->bind_param("s", $regno);
    $stmtStudent->execute();
    $resultStudent = $stmtStudent->get_result();

    if ($resultStudent->num_rows > 0) {
        $student = $resultStudent->fetch_assoc();

        // Fetch marks for the student
        $sqlMarks = "SELECT * FROM marks WHERE registerno = ?";
        $stmtMarks = $conn->prepare($sqlMarks);
        $stmtMarks->bind_param("s", $regno);
        $stmtMarks->execute();
        $resultMarks = $stmtMarks->get_result();

        // Display marks
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Marks for <?php echo $student['name']; ?></title>
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container mt-5">
                <h1 class="text-center mb-5 text-center mt-5 m-5 text-uppercase" style="color: #155724;">Marks for <?php echo $student['name']; ?></h1>

                <!-- Display student details here -->

                <?php
                if ($resultMarks->num_rows > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowMarks = $resultMarks->fetch_assoc()) {
                                foreach ($subjects as $subject) {
                                    echo "<tr>";
                                    echo "<td>" . ucfirst($subject) . "</td>";
                                    echo "<td>{$rowMarks[$subject]}</td>";
                                    echo "<td>" . calculateGrade($rowMarks[$subject]) . "</td>";
                                    echo "</tr>";
                                }
                                echo "<tr>";
                                echo "<td style='color:red;'><b>Total Mark</b></td>";
                                echo "<td colspan='2' class='text-center'><b>{$rowMarks['total_marks']}</b></td>";
                                echo "</tr>";
                                echo "<tr>";
                            }
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $user = $_GET['userid'];
                                    $role = "student";
                                    // SQL query to select id and role based on the username
                                    $sql = "SELECT id, role FROM users WHERE username = '$user'";
                                    $result = $conn->query($sql);

                                    // Check if the query was successful
                                    if ($result) {
                                        // Fetch the result as an associative array
                                        $row = $result->fetch_assoc();

                                        // Check if a matching record was found
                                        if ($row) {
                                            // Store the values in variables
                                            $id = $row['id'];
                                            $role = $row['role'];

                                            // Now, $id and $role contain the values from the selected record
                                            // echo "ID: $id, Role: $role";
                                        }

                                        // Free the result set
                                        $result->free();
                                    } else {
                                        echo "Error executing the query: " . $conn->error;
                                    }

                                    if ($role == "admin") {
                                        echo "
                                        
                                        
                                        <div>
                                        <a href='adminprofile.php' style='text-decoration: none;'>
                                            <button type='button' class='btn btn-danger my-3 text-center'>
                                                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                                Go Back
                                            </button>
                                        </a>
                                        </div>
                                      </div>";
                                    } else {
                                        echo "<div class=''>
                                        <a href='student.php' style='text-decoration: none;'>
                                            <button type='button' class='btn btn-danger my-3 text-center'>
                                                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                                Go Back
                                            </button>
                                        </a>
                                        
                                      </div>";
                                    }
                                    echo "</div>";
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "<div class='row alert alert-danger'>";

                    echo "<div class='  col-md-6 mt-3'>No marks entered for this student. </div>";
                    $user = $_GET['userid'];
                    $role = "student";
                    // SQL query to select id and role based on the username
                    $sql = "SELECT id, role FROM users WHERE username = '$user'";
                    $result = $conn->query($sql);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();

                        // Check if a matching record was found
                        if ($row) {
                            // Store the values in variables
                            $id = $row['id'];
                            $role = $row['role'];

                            // Now, $id and $role contain the values from the selected record
                            // echo "ID: $id, Role: $role";
                        }

                        // Free the result set
                        $result->free();
                    } else {
                        echo "Error executing the query: " . $conn->error;
                    }

                    if ($role == "admin") {
                        echo "<div class='extra-div col-md-6 d-flex justify-content-end col-md-6 '>
                        <div class='mx-2'>
                        <a href='addmarks.php' style='text-decoration: none;'>
                            <button type='button' class='btn btn-info my-3 text-center'>
                                <i class='fas fa-plus fa-sm fa-fw mr-2 text-gray-400'></i>
                                Add Mark
                            </button>
                        </a>
                        </div>
                        <div>
                        <a href='adminprofile.php' style='text-decoration: none;'>
                            <button type='button' class='btn btn-danger my-3 text-center'>
                                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                Go Back
                            </button>
                        </a>
                        </div>
                      </div>";
                    } else {
                        echo "<div class='extra-div col-md-6 d-flex justify-content-end'>
                        <a href='student.php' style='text-decoration: none;'>
                            <button type='button' class='btn btn-danger my-3 text-center'>
                                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                Go Back
                            </button>
                        </a>
                        
                      </div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
<?php
    } else {
        echo "Student not found.";
    }
} else {
    echo "Invalid request.";
}

function calculateGrade($mark)
{
    switch (true) {
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