<?php
include "shared/_header.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}

if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 4) - 4;
}

$sql = "SELECT * FROM products LIMIT $begin,4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $lst_allproduct = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories_item categories_large_item">
                    <img src="images/category-1.jpg" alt="" class="img-fluid">
                    <div class="categories_text">
                        <h1>Women's Fashion</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <a href="#">Buy now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 p-0">
                        <div class="categories_item">
                            <img src="images/category-2.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Men's Fashion</h4>
                                <a href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0">
                        <div class="categories_item">
                            <img src="images/category-3.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Kid's Fashion</h4>
                                <a href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0">
                        <div class="categories_item">
                            <img src="images/category-4.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Cosmetics</h4>
                                <a href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0">
                        <div class="categories_item">
                            <img src="images/category-5.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Accessory</h4>
                                <a href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product spad">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="section-title">
                <h4>All Product</h4>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row property_gallery">
            <?php
            foreach ($lst_allproduct as $allproduct) :
            ?>
                <div style="width: 25%;" class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product_item">
                        <div class="product_item_pic">
                            <img src="admin/uploads/<?php echo $allproduct['thumbnail']; ?>" alt="">
                            <div class="label new">New</div>
                            <ul class="product_hover">
                                <li><a href="#"><i class="fa fa-arrows-alt"></i></a></li>
                                <li><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                <li><a href="productdetails.php?id=<?php echo $allproduct['id']; ?>"><i class="fa-solid fa-cart-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="product_item_text">
                            <h6><a href="#"><?php echo $allproduct['product_name']; ?></a></h6>
                            <div class="product_price"><?php echo number_format($allproduct['price'], 0, ',', '.') . 'đ'; ?></div>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>

    </div>
</section>
<?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$row_count = $result->num_rows;

$trang = ceil($row_count / 4);
?>
<nav aria-label="Page navigation example">
    <ul style="width: 100px; margin: 0 auto;" class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php
        for ($i = 1; $i <= $trang; $i++) {

        ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>

    </ul>
</nav>

<?php
include "shared/_footer.php";
?>