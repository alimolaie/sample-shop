<?php
include '../connect.php';
if(isset($_GET['idUser']))
{
    $id = $_GET['idUser'];
    $query = $connect->prepare("SELECT * FROM `users` WHERE ID=:id");
    $query->execute(array(':id' => $id));
    $row = $query->fetch();
    $name = $row['first_name'];
    $family= $row['last_name'];
    $phone=$row['phone'];
}
?>
<!doctype html>
<html lang="fa">
<?php include '../layots/topbar.php'; ?>
<body>
<div class="container">
    <div class="row">
        <div class="col-2 bg-warning">
            <?php include '../layots/sidebar.php'; ?>

        </div>
        <div class="col-10">
            <div class="card">
                <form method="post" action="updateUser.php">
                    <div class="card-header alert-warning">
                        <h3>ویرایش کاربر</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" class="mr-5" >
                            <label for="name">نام</label>
                            <input name="name" type="text" value="<?=$name ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">نام خانوادگی</label>
                            <input type="text" name="family" value="<?= $family ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">شماره تماس</label>
                            <input type="number" name="phone" value="<?= $phone ?>">
                        </div>
                        <div class="form-group" >
                            <label for="type">نوع کاربری</label>
                            <select name="type" style="width: 18%" >
                                <option value="1">ادمین</option>
                                <option value="0">کاربر</option>
                            </select>
                        </div>
                        <div>
                            <input name="id" type="hidden" value="<?= $id ?>">
                            <button type="submit" name="editUser" class="btn btn-warning mt-3 mr-5">ویرایش کاربر</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


