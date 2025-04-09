<!-- filepath: c:\xampp\htdocs\Purchase-Order-System\src\layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Use an absolute path for the CSS file -->
    <link rel="stylesheet" href="/Purchase-Order-System/src/output.css">
    <title><?php echo $title ?? 'Dashboard'; ?></title>
</head>
<body>
    <?php include('components/headerComponent.php'); ?>
    <div class="flex">
        <?php include('components/sidebarComponent.php'); ?>
        <main class="flex-1 p-4">
            <?php
            // Safely include the content file
            if (isset($content) && file_exists($content)) {
                include($content);
            } else {
                echo '<p>Content not found.</p>';
            }
            ?>
        </main>
    </div>
</body>
</html>