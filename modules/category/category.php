<?php
// phan trang
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];
$sql = "SELECT * FROM product WHERE cat_id='$cat_id'";
$query = mysqli_query($connect,$sql);
$count = mysqli_num_rows($query);
?>
<!--	List Product	-->

<div class="products">
    <h3><?php echo $cat_name; ?> (hiện có <?php echo $count; ?> sản phẩm)</h3>
    <div class="product-list row">
        <?php
        while ($row = mysqli_fetch_assoc($query)){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/products/<?php echo $row['prd_image']?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($row['prd_price'], 0)?></span></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">

    </ul>
</div>
