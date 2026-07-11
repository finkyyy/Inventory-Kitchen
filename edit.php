<?php include 'koneksi.php'; 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM bahan_baku WHERE id_bahan = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $id_kat = $_POST['id_kategori'];
    $nama   = $_POST['nama_bahan'];
    $stok   = $_POST['stok'];
    $satuan = $_POST['satuan'];

    $update = "UPDATE bahan_baku SET id_kategori = '$id_kat', nama_bahan = '$nama', stok = '$stok', satuan = '$satuan' WHERE id_bahan = '$id'";

    if (mysqli_query($koneksi, $update)) {
        header("Location: tampilan.php");
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #F1EFE7 0%, #D8D2C2 100%); min-height: 100vh; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.3); }
        .btn-modern { transition: 0.4s; border-radius: 10px; }
        .btn-modern:hover { transform: translateY(-3px); }
    </style>
</head>
<body class="p-4">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 glass-card p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color: #7D8F69;">✏️ Edit Bahan Baku</h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Kategori:</label>
                    <select name="id_kategori" class="form-select">
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori_bahan");
                        while ($row = mysqli_fetch_assoc($kat)) {
                            $selected = ($row['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                            echo "<option value='".$row['id_kategori']."' $selected>".$row['nama_kategori']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" value="<?php echo $data['nama_bahan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok:</label>
                    <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Satuan:</label>
                    <input type="text" name="satuan" class="form-control" value="<?php echo $data['satuan']; ?>" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="tampilan.php" class="btn btn-outline-secondary btn-modern">Batal</a>
                    <button type="submit" name="update" class="btn btn-warning btn-modern px-4 text-white">Simpan Perubahan</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

</body>
</html>