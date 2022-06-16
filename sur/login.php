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

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/all.min.css" />
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
  <title>Login</title>
</head>

<body>
  <!-- Start Navbar -->
  <nav dir="rtl" class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.html"><i style="height: 30px; color: white" class="fa-solid fa-graduation-cap"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">المواد الدراسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">التنبيهات
              <i class="fa-solid fa-bell" style="color: white"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">من نحن</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">أتصل بنا</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- Start Content -->
  <form dir="rtl" method="post" action="">
    <div class="mb-3">
      <label for="txt_uname" class="form-label fs-3">البريد الالكتروني</label>
      <input type="text" class="form-control" id="txt_uname" name="txt_uname" aria-describedby="emailHelp" />
      <div id="emailHelp" class="form-text">
        لن نشارك بريدك الإلكتروني مع أي شخص آخر.
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label fs-3">كلمة السر</label>
      <input type="password" class="form-control" id="txt_uname" name="txt_pwd" />
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">تذكرني</label>
    </div>
    <button type="submit" class="btn btn-primary" name="but_submit" id="but_submit">دخول</button>
    <a class="forget" href="../php_change_password/change_password.php"> نسيت الرقم السري ؟</a>
  </form>
  <!-- End Content -->
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>