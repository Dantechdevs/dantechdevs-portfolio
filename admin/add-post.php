<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO blog_posts (title, slug, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $slug, $content);
    $stmt->execute();

    header("Location: manage-blog.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Blog Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">

    <h1 class="text-3xl font-bold text-orange-500 mb-6">Add New Blog Post</h1>

    <form method="POST" class="space-y-4">
        <input type="text" name="title" required placeholder="Post Title" class="w-full p-2 rounded text-black" />
        <textarea name="content" required placeholder="Write your post..."
            class="w-full p-2 rounded text-black h-60"></textarea>
        <button type="submit"
            class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">Publish</button>
    </form>

</body>

</html>