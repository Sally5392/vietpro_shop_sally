<?php
$sql = "SELECT * FROM product ORDER BY prd_id ASC LIMIT 6";
$query = mysqli_query($connect, $sql);
?>
<div class="products">
    <h3>Sản phẩm mới</h3>
    <div class="product-list row">
        <?php
        while($row = mysqli_fetch_assoc($query)){
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="#"><img src="admin/img/products/<?php echo $row['prd_image']?>"></a>
                    <h4><a href="#"><?php echo $row['prd_name']?></a></h4>
                    <p>Giá Bán: <span><?php echo $row['prd_price']?></span></p>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<!--	End Latest Product	-->