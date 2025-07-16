<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM projects WHERE id = $id");
    header("Location: manage-projects.php");
    exit;
}

// Fetch projects
$projects = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen p-6">

    <h1 class="text-3xl font-bold text-orange-500 mb-6">Manage Projects</h1>
    <a href="add-project.php" class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-white hover:text-orange-500">+
        Add New Project</a>

    <div class="mt-6">
        <?php while ($project = $projects->fetch_assoc()): ?>
        <div class="border p-4 rounded mb-4 bg-gray-900">
            <h2 class="text-xl font-bold"><?php echo htmlspecialchars($project['title']); ?></h2>
            <p class="mb-2"><?php echo htmlspecialchars(substr($project['description'], 0, 150)); ?>...</p>
            <div class="space-x-4">
                <a href="edit-project.php?id=<?php echo $project['id']; ?>"
                    class="text-yellow-400 hover:underline">Edit</a>
                <a href="?delete=<?php echo $project['id']; ?>" class="text-red-500 hover:underline"
                    onclick="return confirm('Delete this project?')">Delete</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

</body>

</html>