<?php
ob_start();

// Start including header
include 'header.php';
// End including header
?>

<!-- Start including cart -->
<?php  count($product->getData('cart')) ? include './Template/_cart-template.php' : include './Template/notFound/_cart_notFound.php'?>
<!-- End including cart -->

<!-- Start including wishlist -->
<?php count($product->getData('wishlist')) ? include './Template/_wishlist.php' : include './Template/notFound/_wishlist_notFound.php' ?>
<!-- End including wishlist -->

<!-- Start including new phones -->
<?php include './Template/_new-phones.php'; ?>
<!-- End including new phones -->

<?php
// Start including footer
include 'footer.php';
// End including footer
?>
