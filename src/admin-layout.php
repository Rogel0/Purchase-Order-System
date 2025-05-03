<?php
session_start();
if (isset($_SESSION['errorLogin'])) {
    echo "<script>console.log('Error Login: " . $_SESSION['errorLogin'] . "');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../output.css">
    <link rel="shortcut icon" href="../images/BG_LOGIN.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <title><?php echo $title ?? 'Dashboard'; ?></title>
</head>

<body>
    <?php include('modals/logoutModal.php'); ?>
    <?php include('components/admin-components/headerComponent.php'); ?> 
    <div class="flex">
 
        <?php include('components/admin-components/sidebarComponent.php'); ?> 
        <main class="flex-1 p-4">
            <?php
            if (isset($content) && file_exists($content)) {
                include($content);
            } else {
                echo '<p>Content not found.</p>';
            }
            ?>
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="../script/toast.js"></script>
<script src="../script/toast2.js"></script>
<script src="../utilities/vieModal.js"></script>
<script>
    
    <?php if (isset($_SESSION['error'])): ?>
        showToast("<?php echo $_SESSION['error']; ?>", "error");
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        showToast("<?php echo $_SESSION['success']; ?>", "success");
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</script>
</html>