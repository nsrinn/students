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

        <?php
        // include 'data.php';

        // $errors = array();

        // // ... (Previous code remains unchanged)
        // if (empty($_POST["regno"])) {
        //     $errors["regno"] = "Please select a student Register No.";
        // } else {
        //     $regno = test_input($_POST["regno"]);

        //     $stmt = $conn->prepare("SELECT english, hindi, physics, chemistry, biology, geography, history, computer_science, extra_activities, total_marks FROM marks WHERE registerno = ?");
        //     $stmt->bind_param("s", $regno);
        //     $stmt->execute();
        //     $result = $stmt->get_result();

        //     if ($result->num_rows > 0) {
        //         $existingMarks = $result->fetch_assoc();
        //         $updatedTotalMarks = isset($existingMarks['total_marks']) ? $existingMarks['total_marks'] : 0;
        //         // $updatedTotalMarks=$existingMarks;
        //     } else {
        //         echo "<div class='alert alert-danger'>No marks found for this registration number</div>";
        //         exit; // Exit if no marks found
        //     }


        //     // $updatedTotalMarks = 0;

        //     $subjects = ["english", "hindi", "physics", "chemistry", "biology", "geography", "history", "computer_science", "extra_activities"];

        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //         // Form is submitted

        //         $totalMarks = 0;

        //         foreach ($subjects as $subject) {
        //             if (!empty($_POST[$subject])) {
        //                 $mark = $_POST[$subject];

        //                 if (!is_numeric($mark)) {
        //                     $errors[$subject] = "Invalid marks. Please enter a numeric value.";
        //                 } elseif ($mark < 0 || $mark > 100) {
        //                     $errors[$subject] = "Invalid marks. Marks should be between 0 and 100.";
        //                 } else {
        //                     // Valid numeric mark
        //                     $mark = (int)$mark;

        //                     $stmt = $conn->prepare("UPDATE marks SET $subject = ? WHERE registerno = ?");
        //                     $stmt->bind_param("ss", $mark, $regno);
        //                     $stmt->execute();
        //                     $stmt->close();

        //                     $totalMarks += $mark;
        //                 }
        //             }
        //         }

        //         $stmt = $conn->prepare("UPDATE marks SET total_marks = ? WHERE registerno = ?");
        //         $stmt->bind_param("ss", $totalMarks, $regno);
        //         $stmt->execute();
        //         $stmt->close();

        //         $updatedTotalMarks = $totalMarks;

        //         foreach ($subjects as $subject) {
        //             if (!empty($_POST[$subject])) {
        //                 $mark = (int)$_POST[$subject];
        //                 $grade = calculateGrade($mark);
        //             }
        //         }
        //     }
        // }
        // else {
        //     // Form is not submitted, get the initial total marks from the database
        //     $regno = $_GET['registerno'];
        //     $sql = "SELECT id, registerno, total_marks FROM marks WHERE registerno ='$regno'";
        //     $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        //     $rows = mysqli_fetch_assoc($resultset);
        //    $selected = (isset($_POST['regno']) && $_POST['regno'] == $rows["registerno"]) ? 'selected' : '';

        //     $updatedTotalMarks = isset($rows['total_marks']) ? $rows['total_marks'] : 0; // Set initial total marks
        // }
        include 'data.php';

        $errors = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Form is submitted
            $regno = test_input($_POST["regno"]);

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

        <form action="" method="post">

            <div class="form-group mb-5 col-md-10 mx-auto">
                <?php
                $regno = $_GET['registerno'];
                $sql = "SELECT id, registerno, total_marks FROM marks WHERE registerno ='$regno'";
                $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

                if (mysqli_num_rows($resultset) > 0) {
                ?>
                    <select class="form-control" name="regno" id="regnoSelect" onchange="this.form.submit()">
                        <option value="">Select Student Register No</option>
                        <?php
                        while ($rows = mysqli_fetch_assoc($resultset)) {
                            $selected = ($_POST['regno'] == $rows["registerno"]) ? 'selected' : '';
                            $updatedTotalMarks = isset($rows['total_marks']) ? $rows['total_marks'] : 0; // Set initial total marks

                            // Output the option element for each row
                            echo "<option value=\"{$rows["registerno"]}\" {$selected}>{$rows["registerno"]}</option>";
                        }
                        ?>
                    </select>
                <?php
                } else {
                    echo "<div class='row alert alert-danger'>";
                    echo "<div class='col-md-6 mt-3 mt-1'>No marks entered for this student. </div>";
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
                }
                ?>
                <!-- <?php if (!empty($errors["regno"])) echo "<span class='text-danger'>" . $errors["regno"] . "</span>"; ?> -->
            </div>

            <?php if (!empty($existingMarks)) : ?>
                <h4 class=" col-md-10 mx-auto">Student Marks Table</h4>
                <table class="table col-md-10  mx-auto">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($subjects as $subject) :
                        ?>
                            <tr>
                                <td><?php echo ucfirst($subject); ?></td>
                                <td>
                                    <?php
                                    $subjectValue = isset($_POST[$subject]) ? $_POST[$subject] : (isset($existingMarks[$subject]) ? $existingMarks[$subject] : '');
                                    ?>
                                    <input type="text" class="form-control" name="<?php echo $subject; ?>" value="<?php echo $subjectValue; ?>" placeholder="Out of 100">

                                    <?php if (!empty($errors[$subject])) echo "<span class='text-danger'>" . $errors[$subject] . "</span>"; ?>
                                </td>
                                <td>
                                    <?php
                                    $subjectValue = isset($_POST[$subject]) ? $_POST[$subject] : (isset($existingMarks[$subject]) ? $existingMarks[$subject] : '');
                                    if (is_numeric($subjectValue)) {
                                        $mark = (int) $subjectValue;
                                        // $updatedTotalMarks += $mark;
                                        echo calculateGrade($mark);
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><b style="color: red;">Total Marks</b></td>
                            <td><b><?php

                                    echo $updatedTotalMarks; ?></b></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-primary my-3 text-center" style="background-color: #155724; border:1px solid #155724;">Update</button>
                                <button class="btn btn-danger my-3 text-center"><a href="adminprofile.php" style="text-decoration: none; color:white">Back to dashboard</a></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>