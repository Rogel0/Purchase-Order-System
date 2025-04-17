<?php

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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tingle/0.15.3/tingle.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title><?php echo $title ?? 'Dashboard'; ?></title>
</head>

<body>
    <?php include('modals/logoutModal.php'); ?>
    <?php include('components/headerComponent.php'); ?>
    <div class="flex">
        <?php include('components/sidebarComponent.php'); ?>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tingle/0.15.3/tingle.min.js"></script> -->
<script src="script/toast.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    <?php if (isset($_SESSION['error'])): ?>
        showToast("<?php echo $_SESSION['error']; ?>", "error");
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</script>
</html>