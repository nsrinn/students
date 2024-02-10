<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body style="background-image:url('assets/img/slide/university.jpg'); background-size: cover; background-repeat: no-repeat; height:100%">
  <!-- Section: Design Block -->
  <section class="vh-150" style="background-color:#8587962b;">
    <div class="container py-5 ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-6">
          <div class="card" style="  background-color:#ffffff99; height: 80%; z-index: 1;">
            <div class="row g-0">

              <div class="col-md-12  d-flex align-items-center">
                <div class="card-body p-5 p-lg-4 text-black">
                  <?php
                  error_reporting(E_ALL);
                  ini_set('display_errors', 1);
                  session_start();
                  include 'data.php';


                  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userid']) && isset($_POST['password'])) {
                    $userid = test_input($_POST['userid']);
                    $password = test_input($_POST['password']);

                    if (empty($userid) || empty($password)) {
                      echo "<div class='alert alert-danger'>User Name  and password are required.</div>";
                    } else {
                      // Query the registerform_table to check if the email exists
                      $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
                      $stmt->bind_param("s", $userid);

                      if (!$stmt->execute()) {
                        die("Error executing query: " . $stmt->error);
                      }

                      $result = $stmt->get_result();

                      if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $hashedpassword = $row['password'];

                        // Check if the provided password matches the hashed password
                        if (password_verify($password, $hashedpassword)) {

                          $_SESSION['login_admin'] = $userid;

                          // Redirect to profile.php or perform any other actions for successful login
                          echo "Redirecting to profile.php";
                          echo $_SESSION['login_admin'];
                          header("Location: adminprofile.php");
                          exit();
                        } else {
                          echo "<div class='alert alert-danger'>Invalid User Name  or password </div>";
                        }
                      } else {
                        echo "<div class='alert alert-danger'>Invalid User Name  or password </div>";
                      }


                      // if (isset($_POST['rememberMe'])) {
                      //   // If "Remember Me" is checked, set cookies
                      //   setcookie('login_admin_username', $userid, time() + (86400 * 30), "/"); // 30 days expiration
                      //   setcookie('login_admin_password', $password, time() + (86400 * 30), "/"); // 30 days expiration
                      // } else {
                      //   // If not checked, unset cookies (if they exist)
                      //   setcookie('login_admin_username', '', time() - 3600, "/");
                      //   setcookie('login_admin_password', '', time() - 3600, "/");
                      // }
                      // if (isset($_COOKIE['login_admin_username']) && isset($_COOKIE['login_admin_password'])) {
                      //   // Cookies are set, do something
                      //   $storedUsername = $_COOKIE['login_admin_username'];
                      //   $storedPassword = $_COOKIE['login_admin_password'];

                      //   // Perform actions with the stored data
                      //   echo "Stored Username: $storedUsername";
                      //   echo "Stored Password: $storedPassword";
                      // } else {
                      //   // Cookies are not set
                      //   $storedUsername = '';
                      //   $storedPassword = '';
                      //   echo "Cookies are not set.";
                      // }


                      // Close the statement and result set
                      $stmt->close();
                      $result->close();
                    }
                  }

                  function test_input($data)
                  {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                  }
                  ?>


                  <form method="post" id="adminloginForm" enctype="multipart/form-data">
                    <script>
                      document.addEventListener("DOMContentLoaded", function() {
                        // Retrieve stored values
                        var storedUsername = "<?php echo $storedUsername; ?>";
                        var storedPassword = "<?php echo $storedPassword; ?>";

                        // Set form field values
                        document.getElementById('userid').value = storedUsername;
                        document.getElementById('password').value = storedPassword;
                      });
                    </script>

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                      <!-- <h1 class="h1 fw-bold mb-0 ml-5 text-center align-items-center" style="color: #155724; text-align:center !important;">Log In</h1> -->
                    </div>

                    <h2 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;"><b>Admin Login</b></h2>

                    <div class="form-outline mb-4  ">
                      <input type="text" id="form2Example17" class="form-control form-control-lg sign-form" name="userid" style="border-top: none; border-left: none; border-right: none; border-bottom: 1.5px solid gray; border-radius: 0; background-color: transparent;" />
                      <label class="form-label" for="form2Example17">User Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg sign-form" name="password" style="border-top: none; border-left: none; border-right: none; border-bottom: 1.5px solid gray; border-radius: 0; background-color: transparent;" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <!-- <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div> -->

                    <div class="pt-1 mb-4 text-center">
                      <button class="btn btn-dark btn-lg btn-block align-items-center px-5" type="submit" style="background-color: #155724;border-color: #334240;">Login</button>
                    </div>


                    <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                    <p class="mb-5 pb-lg-2" style="color: black;"><b>Don't have an account? </b><a href="adminregister.php" style="color: blue;"><b>Register here</b></a></p>
                    <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    // JavaScript function to show stored credentials when "Remember Me" is checked
    function showStoredCredentials() {
      var rememberMeCheckbox = document.getElementById('rememberMe');
      var usernameInput = document.getElementById('form2Example17');
      var passwordInput = document.getElementById('form2Example27');

      if (rememberMeCheckbox.checked) {
        // If "Remember Me" is checked, populate inputs with stored values
        var storedUsername = "<?php echo isset($_COOKIE['login_admin_username']) ? htmlspecialchars($_COOKIE['login_admin_username']) : ''; ?>";
        var storedPassword = "<?php echo isset($_COOKIE['login_admin_password']) ? htmlspecialchars($_COOKIE['login_admin_password']) : ''; ?>";

        usernameInput.value = storedUsername;
        passwordInput.value = storedPassword;
      } else {
        // If not checked, clear inputs
        usernameInput.value = '';
        passwordInput.value = '';
      }
    }
  </script>
</body>

</html>