<?php
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id=$user_id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

    if(isset($_POST['sbm'])){
        $name = $_POST['user_full'];
        $mail = $_POST['user_mail'];
        $pass = $_POST['user_pass'];
        $re_pass = $_POST['user_re_pass'];
        $level = $_POST['user_level'];

        //kiem tra email vua nhap co ton tai k
        $sql_user = "SELECT * FROM user WHERE user_mail='$mail' AND user_id <> $user_id";

        $query_user = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($query_user);
        if($count > 0 && $pass != $re_pass){
            var_dump($mail);
            $error = '<div class="alert alert-danger">Email đã tồn tại. Mat khau khong khop!</div>';
        }else{
            $sql = "UPDATE user SET user_full='$name', user_mail='$mail', user_pass='$pass', user_level='$level' WHERE user_id=$user_id";
            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=user');
        }
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li><a href="">Quản lý thành viên</a></li>
            <li class="active"><?php echo $row['user_full']; ?></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thành viên: <?php echo $row['user_full']; ?></h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" method="post">
                            <?php
                                if(isset($error)){
                                    echo $error;
                                }
                            ?>
                            <div class="form-group">
                                <label>Họ & Tên</label>
                                <input type="text" name="user_full" required class="form-control" value="<?php echo $row['user_full']; ?>"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_mail" required value="<?php echo $row['user_mail']; ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="user_pass" required value="<?php echo $row['user_pass']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="user_re_pass" required value="<?php echo $row['user_pass']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option <?php  if($row['user_level'] == 1){echo 'selected';} ?> value=1>Admin</option>
                                    <option <?php  if($row['user_level'] == 2){echo 'selected';} ?> value=2>Member</option>
                                </select>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>    <!--/.main-->

