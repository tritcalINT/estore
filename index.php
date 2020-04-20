
<?php
include_once 'header.php';

if (isset($_GET['error'])) {

    $error = $_GET['error'];
} else {

    $error = '';
}
?>

<!-- End Header -->
<div id="content">
    <?php require_once './main_banner.php'; ?>
    <!-- End Content Top -->
    <?php require_once './new_arrival.php'; ?>
    <!-- End New Arrival Product -->
    <?php require_once './grid_banner.php'; ?>
</div>
<!-- End Content -->
<?php
include ("footer.php");
include ("footerhtmlbottom.php");
?>
<!-- End Footer -->

</div>


</body>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5d3693109b94cd38bbe8c20b/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->


</html>