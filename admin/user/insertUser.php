<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</header>

<body>
<div class="header">
    <nav class="navbar navbar-expand-sm bg-warning justify-content-center ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="../product/product.php" >محصولات</a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-white" href="#">کاربران</a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-white" href="../payment/payment.php">پرداخت ها</a>
            </li>
        </ul>
    </nav>
</div><br>
<div class="container">
    <?php
    if (isset($_GET['errorPass']))
    echo "<div class='alert alert-danger my-3'>رمز عبور و تکرار آن برابر نیست</div>";
    ?>
  <div class="card">
      <form method="post" action="submitUser.php" >
          <div class="card-header alert-warning">
              <h3>ثبت کاربر جدید</h3>
          </div>
          <div class="card-body">
              <div class="form-group  "  >
                  <label for="name">نام: </label>
                  <input name="name" type="text" class="mr-5">
              </div>
              <div class="form-group">
                  <label for="family">نام خانوادگی:</label>
                  <input type="text" name="family">
              </div>
              <div class="form-group" >
                  <label for="phone">شماره تماس:</label>
                  <input type="number" name="phone">
              </div>
              <div class="form-group ">
                  <label for="password">رمز عبور:</label>
                  <input type="password" name="password" class="mr-4" required>
              </div>
              <div class="form-group ">
                  <label for="password-confirm">تکرار رمز:</label>
                  <input type="password" name="password-confirm" required class="mr-4">
              </div>
              <div class="form-group" >
                  <label for="type">نوع کاربری:</label>
                  <select name="type" style="width: 17%" >
                      <option value="1">ادمین</option>
                      <option value="0">کاربر</option>
                  </select>
              </div>
              <div>
                  <button type="submit" name="insertUser" class="btn btn-warning mt-3 mr-5">ثبت کاربر</button>
              </div>
          </div>
      </form>

  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


