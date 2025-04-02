<?php
include 'connect.php';
$id = $_GET['updateid']; // Missing semicolon fixed
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Corrected SQL Query with proper variable interpolation
    $sql = "UPDATE `crud` SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Update successfully";
        // header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name; ?>">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" autocomplete="off">
        </div>

        <div class="form-group mb-3">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter your mobile number" name="mobile" autocomplete="off">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" autocomplete="off">
        </div>

      

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
