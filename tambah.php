<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Bahan Baku</title>
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
            
            <?php
            if (isset($_POST['simpan'])) {
                $id_kat = $_POST['id_kategori'];
                $nama   = $_POST['nama_bahan'];
                $stok   = $_POST['stok'];
                $satuan = $_POST['satuan'];

                $query = "INSERT INTO bahan_baku (id_kategori, nama_bahan, stok, satuan) 
                          VALUES ('$id_kat', '$nama', '$stok', '$satuan')";
                
                if (mysqli_query($koneksi, $query)) {
                    header("Location: tampilan.php");
                } else {
                    echo "<div class='alert alert-danger'>Gagal: " . mysqli_error($koneksi) . "</div>";
                }
            }
            ?>
            <h3 class="fw-bold mb-4" style="color: #7D8F69;">+ Tambah Bahan Baku</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Kategori:</label>
                    <select name="id_kategori" class="form-select">
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori_bahan");
                        while ($row = mysqli_fetch_assoc($kat)) {
                            echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" required placeholder="Contoh: Bawang Putih">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok:</label>
                    <input type="number" name="stok" class="form-control" required placeholder="0">
                </div>
                <div class="mb-3">
                    <label class="form-label">Satuan:</label>
                    <input type="text" name="satuan" class="form-control" required placeholder="kg/pcs/gram">
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="tampilan.php" class="btn btn-outline-secondary btn-modern">Kembali</a>
                    <button type="submit" name="simpan" class="btn btn-dark btn-modern px-4">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>