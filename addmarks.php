<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Table</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        // Function to handle form submission using AJAX
        // function submitForm(event) {
        //     // Serialize the form data
        //     var formData = $("#marksForm").serialize();

        //     // Send an AJAX request
        //     $.ajax({
        //         type: "POST",
        //         url: "addmarks.php", // Replace with the actual PHP script handling the form submission
        //         data: formData,
        //         dataType: "json", // Expect JSON response from the server
        //         success: function(response) {
        //             // Handle the response from the server
        //             if (response.status === "success") {
        //                 // Update the content on success
        //                 $("#addmarks").html("<div class='alert alert-success'>" + response.message + "</div>");
        //             } else if (response.status === "error") {
        //                 // Display errors for each field
        //                 $.each(response.errors, function(field, error) {
        //                     $("#" + field + "Error").text(error);
        //                 });
        //             }
        //         },
        //         error: function(xhr, textStatus, errorThrown) {
        //             console.error("AJAX request failed:", textStatus, errorThrown);
        //             alert("Error submitting the form");
        //         }
        //     });

        //     // Prevent the default form submission
        //     event.preventDefault();
        // }
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="php">
            <h1 class="text-center mb-5 text-center mt-5 m-5 text-uppercase" style="color: #155724;">Add Marks</h1>

            <?php
            include 'data.php';

            $errors = array();
            // $response = array("status" => "error", "message" => "Form submission failed", "errors" => array());

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["regno"])) {
                    $errors["regno"] = "Please select a student Register No.";
                } else {
                    $regno = test_input($_POST["regno"]);

                    // Check if regno is unique
                    $stmt = $conn->prepare("SELECT id FROM marks WHERE registerno = ?");
                    $stmt->bind_param("s", $regno);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        echo "<div class='alert alert-danger'>This regno is already taken</div>";
                        // $errors["regno"] = "This regno is already taken";
                    }

                    $subjects = array("english", "hindi",  "physics", "chemistry", "biology", "geography", "history", "cs", "activities");

                    foreach ($subjects as $subject) {
                        if (!isset($_POST[$subject]) || !is_numeric($_POST[$subject]) || $_POST[$subject] < 0 || $_POST[$subject] > 100) {
                            $errors[$subject] = "Invalid marks. Marks should be a number between 0 and 100.";
                        }
                        if ($_POST[$subject] > 100) {
                            $errors[$subject] = "Mark should be less than or equal to 100";
                        }
                    }

                    if (empty($errors)) {
                        // Calculate total marks
                        $subjectMarks = array(
                            'english' => $_POST["english"],
                            'hindi' => $_POST["hindi"],
                            'physics' => $_POST["physics"],
                            'chemistry' => $_POST["chemistry"],
                            'biology' => $_POST["biology"],
                            'geography' => $_POST["geography"],
                            'history' => $_POST["history"],
                            'cs' => $_POST["cs"],
                            'activities' => $_POST["activities"]
                        );
                        $totalMarks = array_sum(array_map('intval', $subjectMarks));

                        // Insert data into the database
                        $sqlInsert = "INSERT INTO marks (registerno, english, hindi, physics, chemistry, biology, geography, history, computer_science, extra_activities, total_marks) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                        $stmt = $conn->prepare($sqlInsert);

                        if ($stmt) {
                            $stmt->bind_param(
                                "siiiiiiiiii",
                                $regno,
                                $_POST["english"],
                                $_POST["hindi"],
                                $_POST["physics"],
                                $_POST["chemistry"],
                                $_POST["biology"],
                                $_POST["geography"],
                                $_POST["history"],
                                $_POST["cs"],
                                $_POST["activities"],
                                $totalMarks
                            );

                            // Execute the statement
                            $stmt->execute();

                            // Check for errors
                            if ($stmt->error) {
                                echo "Error inserting data: " . $stmt->error;
                            } else {
                                // echo json_encode(array("status" => "success", "message" => "Mark Entered Successfully"));
                                echo "<div class='alert alert-success'>Mark Entered Successfully</div>";
                                $_POST["regno"] = $_POST["english"] = $_POST["hindi"] = $_POST["physics"] = $_POST["chemistry"] = $_POST["biology"] = $_POST["geography"] = $_POST["history"] = $_POST["cs"] = $_POST["activities"] = $totalMarks = '';
                            }

                            // Close the statement
                            $stmt->close();
                        } else {
                            echo "Error preparing statement: " . $conn->error;
                        }
                    }
                }
                // if ($success) {
                //     $response["status"] = "success";
                //     $response["message"] = "Mark Entered Successfully";
                // } else {
                //     // Adjust the response for errors
                //     $response["errors"] = $errors;
                // }
            }
            // echo json_encode($response);
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
                        return 'Invalid mark';
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

        <form action="" method="post" id="marksForm">

            <div class="form-group mb-5 col-md-10 mx-auto" id="addmarks">
                <select class="form-control" name="regno" id="regnoSelect">
                    <option value="">Select Student Register No</option>
                    <?php
                    include 'data.php';
                    $sql = "SELECT id, registerno FROM student";
                    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                    while ($rows = mysqli_fetch_assoc($resultset)) {
                        $selected = ($_POST['regno'] == $rows["registerno"]) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rows["registerno"]; ?>" <?php echo $selected; ?>><?php echo $rows["registerno"]; ?></option>
                    <?php } ?>
                </select>
                <?php if (!empty($errors["regno"])) echo "<span class='text-danger'>" . $errors["regno"] . "</span>"; ?>
            </div>

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

                    <tr>
                        <td>English</td>
                        <td>
                            <input type="text" class="form-control" name="english" value="<?php echo isset($_POST["english"]) ? $_POST["english"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["english"])) echo "<span class='text-danger'>" . $errors["english"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["english"]) && is_numeric($_POST["english"])) {
                                $mark = (int)$_POST["english"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hindi</td>
                        <td>
                            <input type="text" class="form-control" name="hindi" value="<?php echo isset($_POST["hindi"]) ? $_POST["hindi"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["hindi"])) echo "<span class='text-danger'>" . $errors["hindi"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["hindi"]) && is_numeric($_POST["hindi"])) {
                                $mark = (int)$_POST["hindi"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Add more rows for other subjects -->

                    <tr>
                        <td>Physics</td>
                        <td>
                            <input type="text" class="form-control" name="physics" value="<?php echo isset($_POST["physics"]) ? $_POST["physics"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["physics"])) echo "<span class='text-danger'>" . $errors["physics"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["physics"]) && is_numeric($_POST["physics"])) {
                                $mark = (int)$_POST["physics"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Chemistry</td>
                        <td>
                            <input type="text" class="form-control" name="chemistry" value="<?php echo isset($_POST["chemistry"]) ? $_POST["chemistry"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["chemistry"])) echo "<span class='text-danger'>" . $errors["chemistry"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["chemistry"]) && is_numeric($_POST["chemistry"])) {
                                $mark = (int)$_POST["chemistry"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Biology</td>
                        <td>
                            <input type="text" class="form-control" name="biology" value="<?php echo isset($_POST["biology"]) ? $_POST["biology"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["biology"])) echo "<span class='text-danger'>" . $errors["biology"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["biology"]) && is_numeric($_POST["biology"])) {
                                $mark = (int)$_POST["biology"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Geography</td>
                        <td>
                            <input type="text" class="form-control" name="geography" value="<?php echo isset($_POST["geography"]) ? $_POST["geography"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["geography"])) echo "<span class='text-danger'>" . $errors["geography"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["geography"]) && is_numeric($_POST["geography"])) {
                                $mark = (int)$_POST["geography"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td>
                            <input type="text" class="form-control" name="history" value="<?php echo isset($_POST["history"]) ? $_POST["history"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["history"])) echo "<span class='text-danger'>" . $errors["history"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["history"]) && is_numeric($_POST["history"])) {
                                $mark = (int)$_POST["history"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Computer Science</td>
                        <td>
                            <input type="text" class="form-control" name="cs" value="<?php echo isset($_POST["cs"]) ? $_POST["cs"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["cs"])) echo "<span class='text-danger'>" . $errors["cs"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["cs"]) && is_numeric($_POST["cs"])) {
                                $mark = (int)$_POST["cs"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Extra Activities</td>
                        <td>
                            <input type="text" class="form-control" name="activities" value="<?php echo isset($_POST["activities"]) ? $_POST["activities"] : ''; ?>" placeholder="Out of 100">
                            <?php if (!empty($errors["activities"])) echo "<span class='text-danger'>" . $errors["activities"] . "</span>"; ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST["cs"]) && is_numeric($_POST["cs"])) {
                                $mark = (int)$_POST["cs"];
                                echo calculateGrade($mark);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b style="color: red;">Total Marks</b></td>
                        <td>
                            <b>
                                <?php
                                if (isset($_POST["english"], $_POST["hindi"], $_POST["physics"], $_POST["chemistry"], $_POST["biology"], $_POST["geography"], $_POST["history"], $_POST["cs"], $_POST["activities"])) {
                                    $totalMarks = array_sum(array_map('intval', $_POST));
                                    echo $totalMarks;
                                }
                                ?>
                            </b>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <button type="submit" class="btn btn-primary my-3 text-center" style="background-color: #155724; border:1px solid #155724;" onclick="submitForm(event)">Submit</button>
                            <a href="adminprofile.php" style="text-decoration: none;">
                                <button type="button" class="btn btn-danger my-3 text-center">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Dashboard
                                </button>
                            </a>

                            <!-- <button type="submit" class="btn btn-primary my-3 text-center" style="background-color: #155724; border:1px solid #155724;" onclick="submitForm(event)">Submit</button> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include jQuery library -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

    <!-- Your existing JavaScript code -->

    <script>
        // Function to handle form submission using AJAX
        // function submitForm(event) {
        //     // Serialize the form data
        //     var formData = $("#marksForm").serialize();

        //     // Send an AJAX request
        //     $.ajax({
        //         type: "GET",
        //         url: "addmarks.php", // Replace with the actual PHP script handling the form submission
        //         data: formData,
        //         success: function(response) {
        //             // Update the content on success
        //             $(".php").html(response);
        //         },
        //         error: function() {
        //             alert("Error submitting the form");
        //         }
        //     });
        //     // Prevent the default form submission
        //     event.preventDefault();
        // }
    </script>
    <script>
        // Function to handle form submission using AJAX
        // function submitForm(event) {
        //     // Serialize the form data
        //     var formData = $("#marksForm").serialize();

        //     // Send an AJAX request
        //     $.ajax({
        //         type: "POST",
        //         url: "addmarks.php", // Replace with the actual PHP script handling the form submission
        //         data: formData,
        //         // dataType: "json", // Expect JSON response from the server
        //         success: function(response) {
        //             // Handle the response from the server
        //             if (response.status === "success") {
        //                 // alert("hello");
        //                 // Update the content on success
        //                 $("#addmarks").html("<div class='alert alert-success'>" + response.message + "</div>");
        //                 // Optionally, you can clear the form fields here
        //                 // $("#marksForm")[0].reset();
        //             } else if (response.status === "error") {
        //                 // Display errors for each field
        //                 $.each(response.errors, function(field, error) {
        //                     $("#" + field + "Error").text(error);
        //                 });
        //             }
        //         },
        //         error: function(xhr, textStatus, errorThrown) {
        //             console.error("AJAX request failed:", textStatus, errorThrown);
        //             alert("Error submitting the form");
        //         }
        //     });
        //     // $.get("addmarks.php");

        //     // Prevent the default form submission
        //     event.preventDefault();
        // }
    </script>


</body>

</html>