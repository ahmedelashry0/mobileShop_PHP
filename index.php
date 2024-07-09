<?php
ob_start();
// Start including header
include "header.php";
// End including header
?>

<!-- Start including banner area -->
<?php include "./Template/_banner-area.php"; ?>
<!-- End including banner area -->

<!-- Start including top sale -->
<?php include "./Template/_top-sale.php"; ?>
<!-- End including top sale -->

<!-- Start including special price -->
<?php include "./Template/_special-price.php"; ?>
<!-- End including special price -->


<!-- Start including banner ads -->
<?php include "./Template/_banner-ads.php"; ?>
<!-- End including banner ads -->



<!-- Start including new phones -->
<?php include "./Template/_new-phones.php"; ?>
<!-- End including new phones -->


<!-- Start including blogs -->
<?php include "./Template/_blogs.php"; ?>
<!-- End including blogs -->

<?php
// Start including footer
include "footer.php";
// End including footer

//ob_flush();
?>
