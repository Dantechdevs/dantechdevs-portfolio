<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $image_path = $_POST['image_path'];
    $github_url = $_POST['github_url'];
    $live_url = $_POST['live_url'];

    $stmt = $conn->prepare("INSERT INTO projects (title, description, tech_stack, image_path, github_url, live_url, source_type) VALUES (?, ?, ?, ?, ?, ?, 'manual')");
    $stmt->bind_param("ssssss", $title, $description, $tech_stack, $image_path, $github_url, $live_url);
    $stmt->execute();

    header("Location: manage-projects.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">
    <h1 class="text-3xl font-bold text-orange-500 mb-6">Add New Project</h1>

    <form method="POST" class="space-y-4">
        <input type="text" name="title" required placeholder="Title" class="w-full p-2 rounded text-black" />
        <textarea name="description" required placeholder="Description"
            class="w-full p-2 rounded text-black"></textarea>
        <input type="text" name="tech_stack" placeholder="Tech Stack (comma-separated)"
            class="w-full p-2 rounded text-black" />
        <input type="text" name="image_path" placeholder="Image URL" class="w-full p-2 rounded text-black" />
        <input type="text" name="github_url" placeholder="GitHub URL" class="w-full p-2 rounded text-black" />
        <input type="text" name="live_url" placeholder="Live Site URL" class="w-full p-2 rounded text-black" />
        <button type="submit"
            class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">Save</button>
    </form>
</body>

</html>