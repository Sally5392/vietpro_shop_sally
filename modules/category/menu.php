<?php
$sql = "SELECT * FROM category LIMIT 10";
$query = mysqli_query($connect, $sql);
?>
<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php
                while ($row = mysqli_fetch_assoc($query)){ ?>
                    <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php  echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>