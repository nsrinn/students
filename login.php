<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="background-image:url('assets/img/slide/university.jpg'); background-size: cover; background-repeat: no-repeat; height:100%">
  <!-- Section: Design Block -->
  <section class="vh-150" style="background-color: #8587962b; z-index: -1;">
    <div class="container py-5  ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-6" >
          <div class="card " style="  background-color:#ffffff99; height: 80%; z-index: 1;">
            <div class="row g-0">

              <div class="col-md-12  d-flex align-items-center">
                <div class="card-body  p-5 p-lg-4 text-black">
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
                      $stmt = $conn->prepare("SELECT id, registerno, password FROM student WHERE registerno = ?");
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

                          $_SESSION['login_student'] = $userid;

                          // Redirect to profile.php or perform any other actions for successful login
                          echo "Redirecting to profile.php";
                          echo $_SESSION['login_student'];
                          header("Location: student.php");
                          exit();
                        } else {
                          echo "<div class='alert alert-danger'>Invalid Register Number  or password </div>";
                        }
                      } else {
                        echo "<div class='alert alert-danger'>Invalid Register Number  or password </div>";
                      }

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


                  <form method="post" id="StudentloginForm" enctype="multipart/form-data">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                      <!-- <h1 class="h1 fw-bold mb-0 ml-5 text-center align-items-center" style="color: #155724; text-align:center !important;">Log In</h1> -->
                    </div>

                    <h2 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;"><b>Sign in</b></h2>

                    <div class="form-outline mb-4  " >
                      <!-- <input type="text" id="form2Example17" class="form-control form-control-lg " name="userid" style="border-color:#ffffff10;background-color:#ffffff10;"/> -->
                      <input type="text" id="form2Example17" class="form-control form-control-lg sign-form" name="userid" style="border-top: none; border-left: none; border-right: none; border-bottom: 1.5px solid gray; border-radius: 0; background-color: transparent;">


                      <label class="form-label" for="form2Example17">Register Number</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg sign-form" name="password" style="border-top: none; border-left: none; border-right: none; border-bottom: 1.5px solid gray; border-radius: 0; background-color: transparent;"/>
                      <label class="form-label " for="form2Example27">Password</label>
                    </div>

                    <div class="pt-1 mb-4  ml-3 text-center">
                      <button class="btn btn-dark btn-lg btn-block px-5 text-center" type="submit" style="background-color: #155724;border-color: #334240; border: radius 0;">Login</button>
                    </div>

                    
                    <p class="mb-5 pb-lg-2" style="color: dark ;"><b>Don't have an account?</b> <a href="studentregister.php" style="color: blue;"><b>Register here</b></a></p>
                   
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
</body>

</html>