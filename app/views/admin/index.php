<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<h1>This is Admin Index</h1>

<?php
var_dump($_SESSION['user_id']);
var_dump($_SESSION['user_email']);
?>

<?php require APPROOT . "/views/inc/footer.php"; ?>