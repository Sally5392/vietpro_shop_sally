<?php
if (!defined('SECURITY')) {
    die('Ban khong co quyen truy cap file nay');
}
// phan trang
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Gan so luong san pham tren 1 trang
$rows_per_page = 5;

// Cong thuc tinh chi so key
$per_rows = $page * $rows_per_page - $rows_per_page;

// truy van de tinh so luong ban ghi
$total_rows = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
$total_pages = ceil($total_rows / $rows_per_page);

// nut Previous
$list_page = '';
$page_prev = $page - 1;
if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_prev . '">&laquo;</a></li>';

// tinh toan so trang
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=user&page=' . $i . '">' . $i . '</a></li>';
}

// nut next
$page_next = $page + 1;
if ($page_next >= $total_pages) {
    $page_next = $total_pages;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_next . '">&raquo;</a></li>';
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div><!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table
                            data-toolbar="#toolbar"
                            data-toggle="table">

                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="name" data-sortable="true">Họ & Tên</th>
                            <th data-field="price" data-sortable="true">Email</th>
                            <th>Quyền</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT " . $per_rows . ',' . $rows_per_page;;
                        $query = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td style=""><?php echo $row['user_id'] ?></td>
                                <td style=""><?php echo $row['user_full'] ?></td>
                                <td style=""><?php echo $row['user_mail'] ?></td>
                                <td>
                                    <?php if ($row['user_level'] == 1) { ?>
                                        <span class="label label-danger">Admin</span>
                                    <?php } else { ?>
                                        <span class="label label-success">User</span>
                                    <?php } ?>
                                </td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=edit_user&user_id=<?php echo $row['user_id']; ?>"
                                       class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="delete_user.php?user_id=<?php echo $row['user_id']; ?>"
                                       onclick="return deleteItem(<?php echo $row['user_id'];?>)"
                                       class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_page; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>    <!--/.main-->

<script>
    function deleteItem($id) {
        return confirm("Ban muon xoa user " +$id + "?" );
    }
</script>