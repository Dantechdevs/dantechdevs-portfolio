<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM blog_posts WHERE id = $id");
    header("Location: manage-blog.php");
    exit;
}

// Fetch blog posts
$posts = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">

    <h1 class="text-3xl font-bold text-orange-500 mb-6">Manage Blog Posts</h1>
    <a href="add-post.php" class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">+ Add
        New Post</a>

    <div class="mt-6">
        <?php while ($post = $posts->fetch_assoc()): ?>
        <div class="border p-4 rounded mb-4 bg-gray-900">
            <h2 class="text-xl font-bold"><?php echo htmlspecialchars($post['title']); ?></h2>
            <p class="text-sm text-gray-400"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
            <div class="space-x-4 mt-2">
                <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="text-yellow-400 hover:underline">Edit</a>
                <a href="?delete=<?php echo $post['id']; ?>" class="text-red-500 hover:underline"
                    onclick="return confirm('Delete this post?')">Delete</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

</body>

</html>