<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
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

        /* .form-control-line {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
        } */
    </style>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    include 'data.php';
    session_start();
    $nameErr = $lnameErr = $emailErr = $regnoErr = $phoneErr = $genderErr = $dateErr = $addressErr = $guardianErr = $imageErr = $bloodgrpErr = $passwordErr = $conpasswordErr = "";
    $name =  $lname = $email = $regno = $phone = $address = $gender = $guardian = $date = $image = $password = $conpassword = $bloodgrp = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate first name
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

        // Check if email is unique
        $stmt = $conn->prepare("SELECT id FROM student WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $emailErr = "This email is already registered";
        }

        // Check if regno  is unique
        $stmt = $conn->prepare("SELECT id FROM student WHERE registerno = ?");
        $stmt->bind_param("s", $regno);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $regnoErr = "This regno is already taken";
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

        $password = test_input($_POST["password"]);
        if (empty($password)) {
            $passwordErr = "Password is required";
        } elseif (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        }

        // Validate confirm password
        $conpassword = test_input($_POST["conpassword"]);

        if (empty($conpassword)) {
            $conpasswordErr = "Confirm Password is required";
        } elseif ($password != $conpassword) {
            $conpasswordErr = "Passwords do not match";
        }

        // Validate File
        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $imageErr = "File upload failed";
        }


        if (empty($nameErr) && empty($emailErr) && empty($countryErr) && empty($dateErr) && empty($imageErr) && empty($passwordErr) && empty($conpasswordErr)) {

            $allowedImageTypes = ["image/jpeg", "image/png", "image/jpg", "image/svg+xml", "image/gif"];

            // Perform file upload and get the file URL
            $uploadDir = "C:/xampp1/htdocs/students/images/";
            $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

            if (in_array($_FILES["file"]["type"], $allowedImageTypes)) {
                // Move the uploaded file to the destination directory
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
                    // File upload successful, save the file URL
                    $fileUrl = "http://localhost/students/images/" . basename($_FILES["file"]["name"]);

                    // Perform database insertion
                    $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO student(name ,lname ,registerno ,email ,phone,gender,bloodgrp , date_of_birth , guardian , address , password ,image ) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");

                    // Check for a successful prepare
                    if ($stmt) {
                        $stmt->bind_param("ssssssssssss", $name, $lname, $regno, $email, $phone, $gender, $bloodgrp, $date, $guardian, $address, $password, $fileUrl);


                        // Execute the prepared statement

                        // Your other code...

                        if ($stmt->execute()) {
                            echo "<div class='message-box'>Data Entered successfully</div>";

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
                                echo "<div class='message-box'>'Error executing the query:  '. $conn->error</div>";

                                // echo ;
                            }

                            if ($role == "admin") {
                                header("Location: adminprofile.php");
                            } else {
                                header("Location: index.php");
                            }
                            echo "</div>";
                        } else {
                            echo "<div class='message-box'>'Error:  . $stmt->error'</div>";

                            // echo ";
                        }



                        // Close the statement
                        $stmt->close();
                    } else {
                        echo "<div class='message-box'>'Error in the prepared statement: ' . $conn->error</div>";

                        // echo ;
                    }
                } else {
                    echo "<div class='message-box'>'File upload failed!'</div>";

                    // echo "";
                }
            } else {
                echo "<div class='message-box'>Only image files (JPEG, PNG, GIF) are allowed.</div>";
            }
        } else {
            //    echo" <div style='display:flex; justify-content:center; align-items:center; width:80%; backgrpound-color:light-green; >";
            echo "<div class='message-box'><span>Validation errors!!.<br> Please check your input.</span></div>";
            // echo"</div>";
        }
        // If there are no errors, process the form


        // Rest of your code...




        // Add similar validation for other fields

        // If there are no errors, process the form
        // if (empty($nameErr) && empty($emailErr) && empty($countryErr) && empty($dateErr) && empty($resumeErr)) {
        //     // Process the form data (e.g., store it in a database)
        //     // Redirect to a success page or display a success message
        //     header("Location: success.php");
        //     exit();
        // }
    }

    // Helper function to sanitize and validate input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="container">
        <h1 class="text-center mt-5 mb-5 text-uppercase" style="color: #155724;">Registeration Form</h1>
        <div class="form ">
            <form method="post" enctype="multipart/form-data">
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="name" value="<?php echo $name; ?>" placeholder="Your First Name">

                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="lname" value="<?php echo $name; ?>" placeholder="Your Last Name">

                        <span class="error"><?php echo $lnameErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="regno">Register No</label>
                        <input type="text" class="form-control form-control-line" id="regno" name="registerno" value="<?php echo $regno; ?>" placeholder="Your Register No">

                        <span class="error"><?php echo $regnoErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-line" name="email" value="<?php echo $email; ?>" placeholder="Your Email">

                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group form-check col-md-4 ">
                        <label for="form-check-label">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="Female" <?php echo ($gender === 'Female') ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="femaleGender">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="Male" <?php echo ($gender === 'Male') ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="maleGender">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="Other" <?php echo ($gender === 'Other') ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="otherGender">Other</label>
                        </div>
                        <span class="error"> <br><?php echo $genderErr; ?></span>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label for="Bloodgrp">Blood Group</label>
                        <select class="form-control" name="bloodgrp" id="Bloodgrp">
                            <option value="">Select Blood Group</option>
                            <option value="O+ve" <?php echo ($bloodgrp === 'O+ve') ? ' selected' : ''; ?>>O+ve</option>
                            <option value="A+ve" <?php echo ($bloodgrp === 'A+ve') ? ' selected' : ''; ?>>A+ve</option>
                            <option value="B+ve" <?php echo ($bloodgrp === 'B+ve') ? ' selected' : ''; ?>>B+ve</option>
                            <option value="AB+ve" <?php echo ($bloodgrp === 'AB+ve') ? ' selected' : ''; ?>>AB+ve</option>
                            <option value="O-ve" <?php echo ($bloodgrp === 'O-ve') ? ' selected' : ''; ?>>O-ve</option>
                            <option value="AB-ve" <?php echo ($bloodgrp === 'AB-ve') ? ' selected' : ''; ?>>AB-ve</option>
                            <option value="B-ve" <?php echo ($bloodgrp === 'B-ve') ? ' selected' : ''; ?>>B-ve</option>
                            <option value="A-ve" <?php echo ($bloodgrp === 'A-ve') ? ' selected' : ''; ?>>A-ve</option>
                        </select>

                        <span class="error"> <?php echo $bloodgrpErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="date">Date of Birth</label>
                        <input type="date" class="form-control form-control-line" name="date" value="<?php echo $date; ?>" placeholder="Your Date of Birth">
                        <span class="error"><?php echo $dateErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control form-control-line" name="phone" value="<?php echo $phone; ?>" placeholder="Your Phone Number">
                        <span class="error"><?php echo $phoneErr; ?></span>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-8">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control form-control-line" id="address" name="address" rows="3"><?php echo $address; ?></textarea>
                        <span class="error"><?php echo $addressErr; ?></span>

                    </div>
                </div>

                <div class="form-row mb-3">
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
                </div>



                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <label for="guardian">Guardian</label>
                        <input type="text" class="form-control form-control-line" value="<?php echo $guardian; ?>" name="guardian" id="guardian" placeholder="Your Guardian Name">
                        <span class="error"><?php echo $guardianErr; ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control form-control-line" value="<?php echo $file; ?>" name="file" id="file">
                        <span class="error"><?php echo $imageErr; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary" style="background-color: #155724;border-color: #155724;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Ente</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="adminlogout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>