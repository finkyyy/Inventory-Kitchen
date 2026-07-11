<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary-dapur: #7D8F69; --glass: rgba(255, 255, 255, 0.7); }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #F1EFE7 0%, #D8D2C2 100%); min-height: 100vh; }
        .glass-card { background: var(--glass); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 32px rgba(0,0,0,0.1); }
        .btn-modern { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border-radius: 10px; }
        .btn-modern:hover { transform: scale(1.05) translateY(-3px); }
        .table-custom { border-collapse: separate; border-spacing: 0 10px; }
        .table-custom tbody tr { background: white; border-radius: 10px; }
    </style>
</head>
<body class="p-4">

<div class="container mt-4">
    <div class="glass-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: var(--primary-dapur);">📦 Inventaris Dapur</h2>
            <a href="tambah.php" class="btn btn-dark btn-modern px-4">+ Bahan Baru</a>
        </div>

        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="cari_kategori" class="form-select btn-modern" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php
                        $kat_res = mysqli_query($koneksi, "SELECT * FROM kategori_bahan");
                        while($k = mysqli_fetch_assoc($kat_res)) {
                            $selected = (isset($_GET['cari_kategori']) && $_GET['cari_kategori'] == $k['id_kategori']) ? 'selected' : '';
                            echo "<option value='".$k['id_kategori']."' $selected>".$k['nama_kategori']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>
        
        <table class="table table-custom align-middle">
            <thead>
                <tr style="color: #666;">
                    <th>No</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            // Query dengan Filter Kategori dan Diurutkan berdasarkan Satuan (ORDER BY)
            $where = "";
            if (isset($_GET['cari_kategori']) && $_GET['cari_kategori'] != "") {
                $id_kat = $_GET['cari_kategori'];
                $where = "WHERE b.id_kategori = '$id_kat'";
            }
            
            $query = "SELECT b.*, k.nama_kategori FROM bahan_baku b 
                      JOIN kategori_bahan k ON b.id_kategori = k.id_kategori 
                      $where ORDER BY b.satuan ASC"; // Diurutkan sesuai satuan
            
            $res = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($res)) { ?>
            <tr class="shadow-sm">
                <td><?php echo $no++; ?></td>
                <td><strong style="color: #333;"><?php echo $row['nama_bahan']; ?></strong></td>
                <td><span class="badge rounded-pill" style="background: var(--primary-dapur);"><?php echo $row['nama_kategori']; ?></span></td>
                <td><?php echo $row['stok']; ?></td>
                <td><?php echo $row['satuan']; ?></td>
                <td class="text-center">
                    <a href="edit.php?id=<?php echo $row['id_bahan']; ?>" class="btn btn-outline-warning btn-sm btn-modern me-2">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id_bahan']; ?>" class="btn btn-outline-danger btn-sm btn-modern" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>