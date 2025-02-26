<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tugas WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    mysqli_query($koneksi, "UPDATE tugas SET tanggal = '$_POST[tanggal]', status = '$_POST[status]', prioritas = '$_POST[prioritas]' WHERE id = $id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <style>
        body { background: rgb(240, 196, 209); font-family: 'Comic Sans MS', cursive; text-align: center; }
        .container { background: #fff; padding: 20px; width: 50%; margin: auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #ff66b2; }
        input, select, button, a { padding: 10px; margin: 5px; border-radius: 5px; border: 1px solid #ddd; width: 90%; }
        button { background: rgb(248, 143, 204); color: white; border: none; cursor: pointer; }
        button:hover { background: #ff3385; }
        a { text-decoration: none; background: gray; color: white; padding: 10px; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Tugas</h2>
        <form method="POST">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br>
            <label>Status:</label>
            <select name="status">
                <option <?= $data['status'] == 'Belum' ? 'selected' : '' ?>>Belum</option>
                <option <?= $data['status'] == 'Sudah' ? 'selected' : '' ?>>Sudah</option>
            </select><br>
            <label>Prioritas:</label>
            <select name="prioritas">
                <option <?= $data['prioritas'] == 'Rendah' ? 'selected' : '' ?>>Rendah</option>
                <option <?= $data['prioritas'] == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                <option <?= $data['prioritas'] == 'Tinggi' ? 'selected' : '' ?>>Tinggi</option>
            </select><br>
            <button type="submit">Simpan</button>
            <a href="index.php">Batal</a>
        </form>
    </div>
</body>
</html>
