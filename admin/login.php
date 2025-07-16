<?php
session_start();
include '../includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center">

    <form method="POST" class="bg-white text-black p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-4 text-center">Admin Login</h2>

        <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="mb-4">
            <label class="block font-semibold">Username</label>
            <input type="text" name="username" required class="w-full px-3 py-2 border rounded" />
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Password</label>
            <input type="password" name="password" required class="w-full px-3 py-2 border rounded" />
        </div>

        <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Login</button>
    </form>

</body>

</html>