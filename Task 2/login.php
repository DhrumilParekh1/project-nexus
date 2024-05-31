<?php
$loginError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `register2` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // Redirect to homepage on successful login
            header("Location: homepage.php");
            exit();
        } else {
            $loginError = "Enter correct details";
        }
    } else {
        $loginError = "Database query failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body class="gback">
    <h1 class="head" align="center">Barracks Restaurant</h1>
    <div class="box" align="center">
        <form class="tbt" style="padding: 30px;" action="" method="POST">
            <table>
                <tr><td class="stitle" colspan="2" align="center">Login</td></tr>
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
                    <td colspan="2" align="center"><button type="submit">Login</button><br><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><a class="mpage" href="login.html">Already Registered?</a><br><br></td>
                </tr>
            </table>
        </form>
    </div>

    <?php if ($loginError): ?>
    <script>
        showAlert('<?php echo $loginError; ?>');
    </script>
    <?php endif; ?>
</body>
</html>
