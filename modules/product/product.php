<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id='$prd_id'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
?>
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="../../images/product-1.png">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $row['prd_name']?></h1>
            <ul>
                <li><span>Bảo hành:</span><?php echo $row['prd_warranty']?></li>
                <li><span>Đi kèm:</span> <?php echo $row['prd_accessories']?></li>
                <li><span>Tình trạng:</span><?php echo $row['prd_new']?></li>
                <li><span>Khuyến Mại:</span> <?php echo $row['prd_promotion']?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($row['prd_price']); ?></li>
                <li id="status"><?php if($row['prd_status'] == 1){echo 'Còn hàng'; } else{echo 'Het hang';}?></li>
            </ul>
            <div id="add-cart"><a href="#">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về iPhone X 64GB</h3>
            <p><?php echo $row['prd_name']?></p>
        </div>
    </div>

    <!--	Comment	-->
    <?php

    ?>
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            $sql_comm = "SELECT * FROM comment WHERE prd_id='$prd_id'";
            $query_comm = mysqli_query($connect, $sql_comm);
            while ($row = mysqli_fetch_assoc($query_comm)){ ?>
                <div class="comment-item">
                    <ul>
                        <li><b><?php echo $row['comm_name']; ?></b></li>
                        <li><?php echo $row['comm_date'];?></li>
                        <li>
                            <p><?php echo $row['comm_details'];?></p>
                        </li>
                    </ul>
                </div>
                <hr>
            <?php }
            ?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>

