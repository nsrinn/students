<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-center mt-5 m-5 text-uppercase" style="color: #155724;">Student List</h1>

        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Date of Birth</th>
                    <th>Guardian</th>
                    <th>Address</th>
                    <th>Image</th>

                    <th>View Marks</th>
                    <th>Update Marks</th>
                    <th>Edit Details</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include 'data.php';

                $sql = "SELECT id, name,lname, registerno, email,gender,bloodgrp,date_of_birth,guardian,address,image FROM student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']} {$row['lname']}</td>";
                        echo "<td>{$row['registerno']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['gender']}</td>";
                        echo "<td>{$row['bloodgrp']}</td>";
                        echo "<td>{$row['date_of_birth']}</td>";
                        echo "<td>{$row['guardian']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo '<td><img src="' . $row['image'] . '" alt="User Image" style="max-width: 100px;"></td>';
                        echo "<td><a href='viewmarks.php?registerno={$row['registerno']}' class='btn btn-success'>View Marks</a></td>";
                        echo "<td><a href='updatemark.php?registerno={$row['registerno']}' class='btn btn-warning'>Edit Marks</a></td>";
                        echo "<td><a href='editstddetails.php?registerno={$row['registerno']}' class='btn btn-info'>Edit details</a></td>";
                        echo "<td><a href='delete.php?registerno={$row['registerno']}' class='btn btn-danger'>delete details</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
