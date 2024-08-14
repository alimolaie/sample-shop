<!doctype html>
<html lang="fa">
<?php include '../layots/topbar.php'; ?>

<body>
<div class="row mt-1">
    <div class="col-2 alert-warning">
        <?php include '../layots/sidebar.php'; ?>

    </div>
    <div class="col-10">
        <div class="">
            <div class="container" style="direction: ltr">  
            <h2 class="card-header alert-warning">مدیریت کاربران</h2>
            
                <?php
                if (isset($_GET['deleteUser']))
                    echo "<div class='alert alert-success my-3'>کاربر حذف شد</div>";
                if (isset($_GET['submit']))
                    echo "<div class='alert alert-success my-3'>کاربر جدید ثبت گردید</div>";
                if (isset($_GET['edit']))
                    echo "<div class='alert alert-success my-3'>کاربر ویرایش شد</div>";

                ?>

                <div class="card-body">
                    <div class="row " style="direction: rtl">
                        <a class="btn btn-warning  " href="insertUser.php">
                            ثبت کاربر
                        </a>
                        <table style="border:1px solid #0055ff" class="table bg-dark text-white">
                            <thead>
                            <tr>
                                <td class="border">شماره ردیف</td>
                                <td class="border">نوع کاربری</td>
                                <td class="border">نام</td>
                                <td class="border">نام خانوادگی</td>
                                <td class="border">شماره تماس</td>
                                <td class="border">ابزار عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $host = 'localhost';
                            $user = 'root';
                            $pass = "";
                            $db = 'shop';
                            $mySql = new mysqli($host, $user, $pass, $db);    //یک شی از مای اس کیو الی

                            if ($mySql->connect_errno) {      //اگر وصل نشدی و ارور داشتی
                                echo "error in connect " . $mySql->connect_error;     //متن ارور به اضافه \یغام
                                exit();   // خارج شو
                            }

                            $sql = "SELECT * FROM `users`";    //همه یوزر ها رو برای من بیار

                            if ($result = $mySql->query($sql)) {         //اگر کویری رو اجرا کردی  //وصل شو ب دیتابیس و کویری رو اجرا کن
                                while ($row = $result->fetch_row()) {    //هر دقعه به تعداد ردیف ها.ردیف جداکن بریز متغیر رو
                                    ?>
                                    <tr>
                                        <td class="border"><?php echo ($row[0]) ?></td>
                                        <td class="border"><?php echo ($row[1]==0?'مشتری':"ادمین") ?></td>
                                        <td class="border"><?php echo $row[2] ?></td>
                                        <td class="border"><?php echo $row[3]; ?></td>
                                        <td class="border"><?php echo $row[4]; ?></td>
                                        <td class="border"><a class="text-white"
                                                              href="deleteUser.php?idUser=<?php echo $row[0] ?>">حذف</a>
                                            / <a class="text-white" href="editUser.php?idUser=<?php echo $row[0] ?>">ویرایش</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $result->free_result();    //تموم شدن کار
                            }
                            ?>
                            </tbody>

                        </table>
                        <?php
                        $mySql->close();     //مای اس کیو الی که وصل شده بیا ببندش
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
