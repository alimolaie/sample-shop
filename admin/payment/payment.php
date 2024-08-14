
<!doctype html>
<html lang="fa">
<?php include '../layots/topbar.php'; ?>

<body>

<div class="row">
    <div class="col-2 alert-warning">
        <?php include '../layots/sidebar.php'; ?>

    </div>
    <div class="col-10">
        <div class="">
            <div class="container" style="direction: ltr">
            <h2 class="card-header  alert-warning text-black">مدیریت پرداخت ها</h2>
            <br>
            
                <table style="border:1px solid #0055ff" class="table bg-dark text-white">
                    <tr>
                        <td class="border">شماره ردیف</td>
                        <td class="border">نام کاربر</td>
                        <td class="border">نام محصول</td>
                        <td class="border">تاریخ</td>
                    </tr>
                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $pass = "";
                    $db = 'shop';
                    $mySql = new mysqli($host, $user, $pass, $db);

                    if ($mySql->connect_errno) {
                        echo "error in connect " . $mySql->connect_error;
                        exit();
                    }

                    $sql="SELECT * FROM `payment`";

                    if($result=$mySql->query($sql)){
                        while($row=$result->fetch_row()) {  //تا اونجایی که ردیف هست برای من بخون و بیار
                            $user="SELECT * FROM `users` WHERE ID=".$row[1];
                            $findUser= $mySql->query($user);
                            $rowUser=$findUser->fetch_row();
                            $user="SELECT * FROM `product` WHERE ID=".$row[2];
                            $findProduct= $mySql->query($user);
                            $rowProduct=$findProduct->fetch_row();
                            ?>
                            <tr>
                                <td class="border" ><?php echo $row[0] ?></td>
                                <td class="border" ><?php echo $rowUser[2].$rowUser[3] ?></td>
                                <td class="border" ><?php echo $rowProduct[1] ?></td>
                                <td class="border" ><?php echo $row[4] ?></td>

                            </tr>
                            <?php
                        }
                        $result->free_result();
                    }
                    ?>

                </table>
                <?php
                $mySql->close();
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
