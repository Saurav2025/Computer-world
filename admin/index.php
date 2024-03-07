<?php
require('top.inc.php');

$resBanner = mysqli_query($conn, "SELECT * FROM banner where status='1' order by order_no asc");

?>
<div class="body__overlay"></div>
<?php
if (mysqli_num_rows($resBanner) > 0) { ?>

    <!-- Start Slider Area -->
    <div class="slider__container slider--one bg__cat--3">
        <div class="slide__container slider__activation__wrap owl-carousel">
            <!-- Start Single Slide -->
            <?php
            while ($rowBanner = mysqli_fetch_assoc($resBanner)) { ?>
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2><?php echo $rowBanner['heading1'] ?></h2>
                                        <h1><?php echo $rowBanner['heading2'] ?></h1>
                                        <?php
                                        if ($rowBanner['btn_text'] != '' && $rowBanner['btn_link'] != '') {
                                        ?>
                                            <div class="cr__btn">
                                                <a href="<?php echo $rowBanner['btn_link'] ?>"><?php echo $rowBanner['btn_text'] ?></a>
                                            </div>
                                        <?php  }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo BANNER_IMAGE_SITE_PATH . $rowBanner['image'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Single Slide -->
        </div>
    </div>
    <!-- Start Slider Area -->

<?php
}
?>
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                    $get_product = get_product($conn, 4);
                    foreach ($get_product as $list) {
                    ?>

                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=<?php echo $list['id'] ?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id'] ?>','add')"><i class="icon-handbag icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <strike>
                                            <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                        </strike>
                                        <li><?php echo $list['price'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__list clearfix mt--30">
                <?php
                $get_product = get_product($conn, 4, '', '', '', '', 'yes');
                foreach ($get_product as $list) {
                ?>
                    <!-- Start Single Category -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id'] ?>','add')"><i class="icon-handbag icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                <ul class="fr__pro__prize">

                                    <strike>
                                        <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                    </strike>
                                    <li><?php echo $list['price'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<input type="hidden" id="qty" value="1" />
<!-- End Product Area -->
<?php
require('footer.inc.php');
?>