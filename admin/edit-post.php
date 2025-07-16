<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM blog_posts WHERE id = $id");
$post = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE blog_posts SET title=?, slug=?, content=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $slug, $content, $id);
    $stmt->execute();

    header("Location: manage-blog.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Blog Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">

    <h1 class="text-3xl font-bold text-orange-500 mb-6">Edit Blog Post</h1>

    <form method="POST" class="space-y-4">
        <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required
            class="w-full p-2 rounded text-black" />
        <textarea name="content" required
            class="w-full p-2 rounded text-black h-60"><?php echo htmlspecialchars($post['content']); ?></textarea>
        <button type="submit"
            class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">Update</button>
    </form>

</body>

</html>