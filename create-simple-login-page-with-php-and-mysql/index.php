<?php
include "config.php";


if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);


    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            header('Location: ../index.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
?>
<html lang="hi">

<head>
    <title>Create simple login page with PHP and MySQL</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <form method="post" action="../index.php">
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <label for="txt_uname"></label><input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" />
                </div>
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>