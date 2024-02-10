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


    $nameErr = $roleErr = $passwordErr = $conpasswordErr = "";
    $name = $role = $password = $conpassword = "";

    include 'data.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate first name
        $name = test_input($_POST["name"]);
        if (empty($name)) {
            $nameErr = "Username is required";
        } else {
            // Check if name contains only letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
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
    
        // Check if the username is unique
        if (isUsernameUnique($name) ) {
            // Username is unique, proceed with registration
            createAdmin($name, $password);
        } else {
            // Username is not unique
            $nameErr = "This username is already taken";
        }
    }
    
    function isUsernameUnique($username)
    {
        global $conn;
        $query = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $isUnique = ($stmt->num_rows === 0);
        $stmt->close();
        return $isUnique;
    }
   
    
    function authenticateUser($username, $password)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
    
        return null;
    }
    
    function createAdmin($username, $password)
    {
        global $conn;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, role) VALUES (?, ?, 'admin')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        header("Location: adminlogin.php");
        $stmt->close();
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
        <h1 class="text-center mt-5 mb-5 text-uppercase" style="color: #155724;">Sign Up</h1>
        <div class="form ">
            <form   method="post" enctype="multipart/form-data">
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="name" value="<?php echo $name; ?>" placeholder="Your User Name">

                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>

                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-line" name="password" value="<?php echo $password; ?>" minlength="8" placeholder="Password (8 characters minimum)">
                        <span class="error"><?php echo $passwordErr; ?></span>

                    </div>

                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="conpassword">Confirm Password</label>
                        <input type="password" class="form-control form-control-line" id="conpassword" name="conpassword" value="<?php echo $conpassword; ?>" minlength="8" placeholder="Password (8 characters minimum)">
                        <span class="error"><?php echo $conpasswordErr; ?></span>
                    </div>
                </div>




                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary" style="background-color: #155724;border-color: #155724;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>