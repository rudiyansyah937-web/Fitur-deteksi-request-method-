<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SI Akademik - Deteksi Request Method</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box { padding: 15px; border-radius: 5px; margin-bottom: 20px; font-weight: bold; }
        .get-style { background-color: #e3f2fd; color: #0d47a1; border: 1px solid #90caf9; }
        .post-style { background-color: #e8f5e9; color: #1b5e20; border: 1px solid #a5d6a7; }
        form { margin-bottom: 15px; padding: 15px; border: 1px solid #ddd; width: 300px; }
    </style>
</head>
<body>

    <h2>Selamat datang di SI Akademik</h2>

    <?php
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'POST') {
        $username = isset($_POST['username']) ? $_POST['username'] : 'User';
        echo "<div class='box post-style'>";
        echo "Metode Detected: POST<br>";
        echo "Pesan: Anda berhasil melakukan login via POST! Halo, " . htmlspecialchars($username);
        echo "</div>";
    } else {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        echo "<div class='box get-style'>";
        echo "Metode Detected: GET<br>";
        if ($keyword !== '') {
            echo "Pesan: Anda melakukan pencarian via GET dengan kata kunci: " . htmlspecialchars($keyword);
        } else {
            echo "Pesan: Halaman diakses secara normal via metode GET.";
        }
        echo "</div>";
    }
    ?>

    <form action="index.php" method="GET">
        <h3>Form Cari (GET)</h3>
        <input type="text" name="keyword" placeholder="Cari sesuatu..." required>
        <button type="submit">Cari</button>
    </form>

    <form action="index.php" method="POST">
        <h3>Form Login (POST)</h3>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

</body>
</html>