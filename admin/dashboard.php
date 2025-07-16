<?php
session_start();
require_once '../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">

    <div class="p-6">
        <h1 class="text-3xl font-bold text-orange-500 mb-4">Welcome, <?php echo $_SESSION['admin_username']; ?>!</h1>
        <p class="mb-4">You are logged into the Admin Dashboard.</p>

        <div class="space-x-4">
            <a href="manage-projects.php" class="text-orange-500 underline">Manage Projects</a>
            <a href="manage-blog.php" class="text-orange-500 underline">Manage Blog</a>
            <a href="messages.php" class="text-orange-500 underline">View Messages</a>
            <a href="logout.php" class="text-red-500 underline">Logout</a>
        </div>
    </div>

</body>

</html>