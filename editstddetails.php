<!DOCTYPE html>
<html lang="en">

<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Include necessary head content -->
    <?php
    include 'data.php';
    $user = $_GET['userid'];
    // echo"$user";

    // session_start();

    // // Check if the session variable is set
    // $isFromAdminProfile = isset($_SESSION['referrer']) && strpos($_SESSION['referrer'], 'adminprofile.php') !== false;

    // // Unset the session variable to avoid using outdated information
    // unset($_SESSION['referrer']);


    $regno = $_GET['registerno'];
    $nameErr = $lnameErr = $emailErr = $regnoErr = $phoneErr = $genderErr = $dateErr = $addressErr = $guardianErr = $imageErr = $bloodgrpErr = $passwordErr = $conpasswordErr = "";




    // Fetch student details
    $sqlStudent = "SELECT * FROM student WHERE registerno = ?";
    $stmtStudent = $conn->prepare($sqlStudent);
    $stmtStudent->bind_param("s", $regno);
    $stmtStudent->execute();
    $resultStudent = $stmtStudent->get_result();

    if ($resultStudent->num_rows > 0) {
        $student = $resultStudent->fetch_assoc();
        $gender = $student['gender']; // Assuming 'gender' is the column name in your database
        $bloodgrp = $student['bloodgrp']; // Assuming 'bloodgrp' is the column name in your database
        // $existingFilePath = $student['image'];


    ?>
        <!-- Include necessary head content -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Update details of <?php echo $student['name']; ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            .form-row {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .error {
                color: red;
            }

            .message-box {
                margin: 20px;
                padding: 10px;
                border: 1px solid #ccc;
                background-color: #d4edda;
                color: #155724;
            }
        </style>
</head>

<body>
    <div class="container">
        <?php



        ?>
        <h1 class="text-center mt-5 mb-5 text-uppercase" style="color: #155724;">Update details of <?php echo $student['name']; ?></h1>
        <div class="form ">
            <form method="post" enctype="multipart/form-data">
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                                    echo $_POST['name'];
                                                                                                                } else {
                                                                                                                    echo $student['name'];
                                                                                                                } ?>" placeholder="Your First Name">

                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="lname" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                                    echo $_POST['lname'];
                                                                                                                } else {
                                                                                                                    echo $student['lname'];
                                                                                                                } ?>" placeholder="Your Last Name">

                        <span class="error"><?php echo $lnameErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="regno">Register No</label>
                        <input type="text" class="form-control form-control-line" id="regno" name="registerno" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                                            echo $_POST['registerno'];
                                                                                                                        } else {
                                                                                                                            echo $student['registerno'];
                                                                                                                        } ?>" placeholder="Your Register No">

                        <span class="error"><?php echo $regnoErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-line" name="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                            echo $_POST['email'];
                                                                                                        } else {
                                                                                                            echo $student['email'];
                                                                                                        } ?>" placeholder="Your Email">

                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group form-check col-md-4">
        <label for="form-check-label">Gender</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="Female" <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                echo (isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] === 'Female') ? ' checked' : '';
            } else {
                echo (isset($gender) && $gender === 'Female') ? ' checked' : '';
            } ?>>
            <label class="form-check-label" for="femaleGender">Female</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="Male" <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                echo (isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] === 'Male') ? ' checked' : '';
            } else {
                echo (isset($gender) && $gender === 'Male') ? ' checked' : '';
            } ?>>
            <label class="form-check-label" for="maleGender">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="Other" <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                echo (isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] === 'Other') ? ' checked' : '';
            } else {
                echo (isset($gender) && $gender === 'Other') ? ' checked' : '';
            } ?>>
            <label class="form-check-label" for="otherGender">Other</label>
        </div>
        <span class="error"> <br><?php echo $genderErr; ?></span>
    </div>
                    <div class="form-group col-md-4">
                        <label for="Bloodgrp">Blood Group</label>
                        <select class="form-control" name="bloodgrp" id="Bloodgrp">
                            <option value="" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && empty($_POST['bloodgrp'])) ? ' selected' : ''; ?>>Select Blood Group</option>
                            <option value="O+ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'O+ve') ? ' selected' : (($bloodgrp === 'O+ve') ? ' selected' : ''); ?>>O+ve</option>
                            <option value="A+ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'A+ve') ? ' selected' : (($bloodgrp === 'A+ve') ? ' selected' : ''); ?>>A+ve</option>
                            <option value="B+ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'B+ve') ? ' selected' : (($bloodgrp === 'B+ve') ? ' selected' : ''); ?>>B+ve</option>
                            <option value="AB+ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'AB+ve') ? ' selected' : (($bloodgrp === 'AB+ve') ? ' selected' : ''); ?>>AB+ve</option>
                            <option value="O-ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'O-ve') ? ' selected' : (($bloodgrp === 'O-ve') ? ' selected' : ''); ?>>O-ve</option>
                            <option value="AB-ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'AB-ve') ? ' selected' : (($bloodgrp === 'AB-ve') ? ' selected' : ''); ?>>AB-ve</option>
                            <option value="B-ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'B-ve') ? ' selected' : (($bloodgrp === 'B-ve') ? ' selected' : ''); ?>>B-ve</option>
                            <option value="A-ve" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['bloodgrp'] === 'A-ve') ? ' selected' : (($bloodgrp === 'A-ve') ? ' selected' : ''); ?>>A-ve</option>
                        </select>
                        <span class="error"> <?php echo $bloodgrpErr; ?></span>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="date">Date of Birth</label>
                        <input type="date" class="form-control form-control-line" name="date" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                            echo $_POST['date'];
                                                                                                        } else {
                                                                                                            echo $student['date_of_birth'];
                                                                                                        } ?>" placeholder="Your Date of Birth">

                        <span class="error"><?php echo $dateErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control form-control-line" name="phone" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                            echo $_POST['phone'];
                                                                                                        } else {
                                                                                                            echo $student['phone'];
                                                                                                        } ?>" placeholder="Your Phone Number">
                        <span class="error"><?php echo $phoneErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-8">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control form-control-line" id="address" name="address" rows="3"><?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                                    echo $_POST['address'];
                                                                                                                } else {
                                                                                                                    echo $student['address'];
                                                                                                                } ?></textarea>
                        <span class="error"><?php echo $addressErr; ?></span>

                    </div>
                </div>

                <!-- <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-line" name="password" value="<?php echo $password; ?>" minlength="8" placeholder="Password (8 characters minimum)">
                        <span class="error"><?php echo $passwordErr; ?></span>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="conpassword">Confirm Password</label>
                        <input type="password" class="form-control form-control-line" id="conpassword" name="conpassword" value="<?php echo $conpassword; ?>" minlength="8" placeholder="Password (8 characters minimum)">
                        <span class="error"><?php echo $conpasswordErr; ?></span>
                    </div>
                </div> -->



                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="guardian">Guardian</label>
                        <input type="text" class="form-control form-control-line" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                                                                                echo $_POST['guardian'];
                                                                                            } else {
                                                                                                echo $student['guardian'];
                                                                                            }  ?>" name="guardian" id="guardian" placeholder="Your Guardian Name">
                        <span class="error"><?php echo $guardianErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control form-control-line" value="<?php echo $student['image']; ?>" name="file" id="file">
                        <span class="error"><?php echo $imageErr; ?></span>

                        <?php if (!empty($student['image'])) : ?>
                            <?php $existingFilePath = $student['image'];
                            $fileUrl = $existingFilePath; ?>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                // Validate and sanitize input fields (similar to registration form)
                $name = $lname = $email = $regno = $phone = $address = $gender = $guardian = $date = $image = $password = $conpassword = $bloodgrp = $fileUrl = "";

                // Example for 'name' field
                $name = test_input($_POST["name"]);
                if (empty($name)) {
                    $nameErr = "First Name is required";
                } else {
                    // Check if name contains only letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }
                // Validate last name
                $lname = test_input($_POST["lname"]);
                if (empty($lname)) {
                    $lnameErr = "Last Name is required";
                } else {
                    // Check if name contains only letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                        $lnameErr = "Only letters and white space allowed";
                    }
                }

                // Validate Register Noumber
                $regno = test_input($_POST["registerno"]);
                if (empty($regno)) {
                    $regnoErr = "Register Number is required";
                } else {
                    // Check if register number format is valid
                    if (!preg_match("/^[A-Z]{3}[0-9]{3}$/", $regno)) {
                        $regnoErr = "Invalid register number format. It should have three capital letters followed by three numbers.";
                    }
                }

                // Validate Email
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // Check if email is valid
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }



                // Validate Phone Number
                if (empty($_POST["phone"])) {
                    $phoneErr = "phone is required";
                } else {
                    $phone = test_input($_POST["phone"]);
                    // Check if the phone number is exactly 10 digits
                    if (!preg_match('/^\d{10}$/', $phone)) {
                        $phoneErr = "Invalid phone number format. It should be 10 digits.";
                    }
                }

                // Validate Address
                if (empty($_POST["address"])) {
                    $addressErr = "Address is required";
                } else {
                    $address = test_input($_POST["address"]);
                }

                // Validate Gender
                if (empty($_POST["inlineRadioOptions"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["inlineRadioOptions"]);
                }



                // Validate Blood Group
                if (empty($_POST["bloodgrp"])) {
                    $bloodgrpErr = "Blood Group  is required";
                } else {
                    $bloodgrp = test_input($_POST["bloodgrp"]);
                }

                // Validate Date
                if (empty($_POST["date"])) {
                    $dateErr = "Date of Birth is required";
                } else {
                    $date = test_input($_POST["date"]);
                }

                // Validate Guardian
                if (empty($_POST["guardian"])) {
                    $guardianErr = "Guardian name is required";
                } else {
                    $guardian = test_input($_POST["guardian"]);
                }




                if (empty($nameErr) && empty($emailErr) && empty($regnoErr) && empty($phoneErr) && empty($genderErr) && empty($dateErr) && empty($addressErr) && empty($guardianErr) && empty($imageErr) && empty($bloodgrpErr) && empty($passwordErr) && empty($conpasswordErr)) {
                    // All fields are valid, update the data in the database
                    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
                    $fname = $_POST['name'];
                    $lname = $_POST['lname'];
                    $regno = $_POST['registerno'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $gender = $_POST['inlineRadioOptions'];
                    $bloodgrp = $_POST['bloodgrp'];
                    $date = $_POST['date'];
                    $guardian = $_POST['guardian'];
                    $image = $_FILES['file'];
                    // echo"$image";
                    // $fileUrl=$image;


                    // Check if a new file is selected
                    if (is_uploaded_file($image["tmp_name"])) {
                        $uploadDir = "C:/xampp1/htdocs/students/images/";
                        $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);



                        // $stmtUpdate->close();

                        $fileUrl = "http://localhost/students/images/" . basename($_FILES["file"]["name"]);
                        // Debugging: Print file URL after upload
                        // echo "Debug: File URL After Upload: $fileUrl<br>";

                        // Update the file column in the database
                        // Update the file column in the database
                        $sqlUpdateFile = "UPDATE student SET image=? WHERE id=?";
                        $stmtUpdateFile = $conn->prepare($sqlUpdateFile);
                        $stmtUpdateFile->bind_param("si", $fileUrl, $id);
                        $stmtUpdateFile->execute();
                        $stmtUpdateFile->close();
                        // exit;
                    } else {
                        // No new file uploaded, retrieve existing file URL from the database

                        $sqlSelectFile = "SELECT image FROM student WHERE id=?";
                        $stmtSelectFile = $conn->prepare($sqlSelectFile);
                        $stmtSelectFile->bind_param("i", $id);
                        $stmtSelectFile->execute();
                        $stmtSelectFile->bind_result($existingFilePath);
                        $stmtSelectFile->fetch();
                        $stmtSelectFile->close();
                        // $fileUrl = $_FILES['file'];

                        // $existingFilePath = $student['image'];

                        // Check if the file exists in the database
                        if (!empty($existingFilePath)) {
                            $fileUrl = $existingFilePath;
                        } else {
                            // Handle the case when no file is found in the database
                            $imageErr = "No file found in the database.";
                            // You may set a default value for $fileUrl or handle this case as needed
                            // For example, $fileUrl = "default.jpg";
                        }

                        // Debugging: Print existing file path
                        // echo "Debug: Existing File Path: $existingFilePath <br>";

                        // Set fileUrl to the existing file path or an empty string
                        $fileUrl = $existingFilePath ?? '';
                    }


                    $stmtUpdate = $conn->prepare("UPDATE student SET name = ?, lname = ?, registerno = ?, email = ?, phone = ?, gender = ?, bloodgrp = ?, date_of_birth = ?, guardian = ?, address = ?, image = ? WHERE registerno = ?");
                    $stmtUpdate->bind_param("ssssssssssss", $name, $lname, $regno, $email, $phone, $gender, $bloodgrp, $date, $guardian, $address, $fileUrl, $regno);

                    if ($stmtUpdate->execute()) {
                        echo "<div class='row message-box'>
                        <div class='alert alert-success col-md-6 '>Data Updated successfully </div>";
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
                            echo "<div class='extra-div col-md-6 d-flex justify-content-end'>
                            <a href='adminprofile.php' style='text-decoration: none;'>
                                <button type='button' class='btn btn-info my-3 text-center'>
                                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                    Go Back
                                </button>
                            </a>
                          </div>";
                        } else {
                            echo "<div class='extra-div col-md-6 d-flex justify-content-end'>
                            <a href='student.php' style='text-decoration: none;'>
                                <button type='button' class='btn btn-info my-3 text-center'>
                                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                    Go Back
                                </button>
                            </a>
                          </div>";
                        }

                        echo "</div>";
                    } else {
                        echo "Error updating data: " . $stmtUpdate->error;
                    }

                    // $stmtUpdate->close();

                    // Debugging: Print existing file path
                    // echo "Debug: Existing File Path: $existingFilePath <br>";

                    // Set fileUrl to the existing file path or an empty string

                }
                // Example for updating 'name' field

            }
        } else {
            echo "Student not found.";
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Close the connection when done
        $conn->close();
            ?>
            </form>
        </div>
    </div>
    <!-- Include necessary scripts -->
</body>

</html>