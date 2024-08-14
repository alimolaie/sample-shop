<!DOCTYPE html>
<html>
<heade>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</heade>


<!doctype html>
<html lang="fa">
<?php include '../layots/topbar.php'; ?>

<body>
<div class="row mt-1" >
    <div class="col-2 alert-warning">
        <?php include '../layots/sidebar.php'; ?>

    </div>
    <div class="col-10">
        <div class="">

            <div class="container" style="direction: ltr">
            <h2 class="card-header alert-warning">پیام ها</h2>
            <br>
            
                <table style="border:1px solid #0055ff; " class="table bg-dark text-white">
                    <tr>
                        <td class="border">شماره ردیف</td>
                        <td class="border">کد کاربر</td>
                        <td class="border">کد محصول</td>
                        <td class="border">کامنت</td>
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

                    $sql="SELECT * FROM `comment`";

                    if($result=$mySql->query($sql)){
                        while($row=$result->fetch_row()) {  //تا اونجایی که ردیف هست برای من بخون و بیار
                            ?>
                            <tr>
                                <td class="border" ><?php echo $row[0] ?></td>
                                <td class="border" ><?php echo $row[1] ?></td>
                                <td class="border" ><?php echo $row[2] ?></td>
                                <td class="border" ><?php echo $row[3] ?></td>
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
