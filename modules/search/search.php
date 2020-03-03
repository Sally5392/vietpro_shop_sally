<?php
    $keyword = $_POST['keyword'];
    $arr_keyword = array();
    $arr_keyword = explode(' ', $keyword);
    $new_KeyWord = "%".implode('%', $arr_keyword)."%";
    $sql = "SELECT * FROM product
            WHERE prd_name LIKE '$new_KeyWord'";
    $query = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($query);
?>

<div class="products">
    <div id="search-result"><strong>Có <?php echo $total; ?> kết quả tìm kiếm với sản phẩm <span><?php echo $keyword; ?></span></strong></div>
    <hr>
    <div class="product-list row">
    <?php
        while ($row = mysqli_fetch_assoc($query)){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/products/<?php echo $row['prd_image']; ?>"></a>
                    <h4><a href="#"><?php echo $row['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($row['prd_price']); ?></span></p>
                </div>
            </div>
    <?php  } ?>
    </div>
</div>
<!--	End List Product	-->

<!--<div id="pagination">-->
<!--    <ul class="pagination">-->
<!--        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>-->
<!--        <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>-->
<!--    </ul>-->
<!--</div>-->


