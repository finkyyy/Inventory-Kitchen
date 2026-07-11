<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #F1EFE7 0%, #D8D2C2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.3); padding: 2rem; }
    </style>
</head>
<body>

<div class="glass-card shadow-sm text-center">
    <?php
    // LOGIKA PHP ANDA (TIDAK DIUBAH)
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM bahan_baku WHERE id_bahan = '$id'";

        if (mysqli_query($koneksi, $query)) {
            header("Location: tampilan.php");
        } else {
            echo "<h4 class='text-danger'>Gagal menghapus!</h4>";
            echo "<p>" . mysqli_error($koneksi) . "</p>";
            echo "<a href='tampilan.php' class='btn btn-dark'>Kembali ke Daftar</a>";
        }
    } else {
        header("Location: tampilan.php");
    }
    ?>
</div>

</body>
</html>