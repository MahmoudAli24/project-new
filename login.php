<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/all.min.css" />
<div class="container" dir="rtl" style="text-align: right !important;">

  <form method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label fs-3">البريد الالكتروني</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
      <div id="emailHelp" class="form-text">
        لن نشارك بريدك الإلكتروني مع أي شخص آخر.
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label fs-3">كلمة السر</label>
      <input type="password" class="form-control" id="exampleInputPassword1" />
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">تذكرني</label>
    </div>
    <button type="submit" class="btn btn-primary">دخول</button>
  </form>


  <?php
  $username = "root";
  $password = "";
  $database = new PDO("mysql:host=localhost; dbname=PROJECT;", $username, $password);



  if (isset($_POST['btn btn-primary'])) {
    $checkEmail = $database->prepare("SELECT * FROM user WHERE EMAIL = :EMAIL");
    $email = $_POST['email'];
    $checkEmail->bindParam("EMAIL", $email);
    $checkEmail->execute();

    if ($checkEmail->rowCount() > 0) {
      echo '<div class="alert alert-danger" role="alert">
        هذا حساب سابقا مستخدم
      </div>';
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $addUser = $database->prepare("INSERT INTO user(EMAIL,PASSWORD,)
        VALUES(:EMAIL,:PASSWORD)");
      $addUser->bindParam("EMAIL", $email);
      $addUser->bindParam("PASSWORD", $password);
      if ($addUser->execute()) {
        echo '<div class="alert alert-success" role="alert">
            تم إنشاء حساب بنجاح 
          </div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">
            حدث خطا غير متوقع
          </div>';
      }
    }
  }
  ?>