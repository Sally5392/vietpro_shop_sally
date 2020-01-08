<?php
define('SECURITY', true);
include_once('config/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
            <?php
            include_once('modules/logo/logo.php');
            include_once('modules/search/search-box.php');
            include_once('modules/cart/notify.php');
            ?>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <?php include_once('modules/category/menu.php');?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <?php include_once('modules/slider/slide.php');?>
                <!--	End Slider	-->
                <?php
                    // Master page
                    if(isset($_GET['page_layout'])){
                        switch ($_GET['page_layout']){
                            case 'cart': include_once ('modules/cart/cart.php'); break;
                            case 'category': include_once ('modules/category/category.php'); break;
                            case 'product': include_once ('modules/product/product.php'); break;
                            case 'search': include_once ('modules/search/search.php'); break;
                            case 'success': include_once ('modules/cart/success.php'); break;
                        }
                    }else{
                        include_once ('modules/product/featured.php');
                        include_once ('modules/product/lastest.php');
                    }
                ?>
            </div>
            <?php include_once ('modules/aside/aside.php'); ?>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
            <?php include_once ('modules/logo/logo-footer.php'); ?>
            <?php include_once ('modules/address/address.php'); ?>
            <?php include_once ('modules/service/service.php'); ?>
            <?php include_once ('modules/hotline/hotline.php'); ?>

        </div>
    </div>
</div>

<!--	Footer	-->
<?php include_once ('modules/footer/footer.php'); ?>
<!--	End Footer	-->
</body>
</html>
