<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connection.php';
    $email1 = $_POST['email'];
    $password1 = $_POST['password'];
    $confirmpassword1 = $_POST['confirmPassword'];

    $sql = "SELECT * FROM `register2` WHERE email='$email1'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script type='text/javascript'>alert('User already exists');</script>";
        } else {
            if ($password1 == $confirmpassword1) {
                $sql = "INSERT INTO `register2`(email, password, confirm_password) VALUES('$email1', '$password1', '$confirmpassword1')";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    echo "<script type='text/javascript'>alert('Signup successful');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Error');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Invalid password match');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="main.css">
</head>
<body class="gback">
    <h1 class="head" align="center">Barracks Restaurant</h1>
    <div class="box" align="center">
        <form class="tbt" style="padding: 30px;" action="" method="POST">
            <table>
                <tr><td class="stitle" colspan="2" align="center">Sign Up</td></tr>
                <tr><td style="padding-top: 15px;"></td></tr>
                <tr>
                    <td><label for="email">Email ID<br><br></label></td>
                    <td><input type="email" id="email" name="email"><br><br></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label><br><br></td>
                    <td><input type="password" id="password" name="password"><br><br></td>
                </tr>
                <tr>
                    <td><label for="confirmPassword">Confirm Password</label><br><br></td>
                    <td><input type="password" id="confirmPassword" name="confirmPassword"><br><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="submit">Register</button><br><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><a class="mpage" href="login.html">Already Registered?</a><br><br></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
