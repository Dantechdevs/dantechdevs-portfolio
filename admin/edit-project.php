<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM projects WHERE id = $id");
$project = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $image_path = $_POST['image_path'];
    $github_url = $_POST['github_url'];
    $live_url = $_POST['live_url'];

    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, tech_stack=?, image_path=?, github_url=?, live_url=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $description, $tech_stack, $image_path, $github_url, $live_url, $id);
    $stmt->execute();

    header("Location: manage-projects.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">
    <h1 class="text-3xl font-bold text-orange-500 mb-6">Edit Project</h1>

    <form method="POST" class="space-y-4">
        <input type="text" name="title" value="<?php echo $project['title']; ?>" required
            class="w-full p-2 rounded text-black" />
        <textarea name="description" required
            class="w-full p-2 rounded text-black"><?php echo $project['description']; ?></textarea>
        <input type="text" name="tech_stack" value="<?php echo $project['tech_stack']; ?>"
            class="w-full p-2 rounded text-black" />
        <input type="text" name="image_path" value="<?php echo $project['image_path']; ?>"
            class="w-full p-2 rounded text-black" />
        <input type="text" name="github_url" value="<?php echo $project['github_url']; ?>"
            class="w-full p-2 rounded text-black" />
        <input type="text" name="live_url" value="<?php echo $project['live_url']; ?>"
            class="w-full p-2 rounded text-black" />
        <button type="submit"
            class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">Update</button>
    </form>
</body>

</html>