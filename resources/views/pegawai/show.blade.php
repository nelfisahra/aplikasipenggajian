<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_pegawai");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$pegawai_detail = null;
$error = "";

// Jika ada parameter id, tampilkan detail pegawai
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM pegawai WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $pegawai_detail = $result->fetch_assoc();
    } else {
        $error = "Pegawai tidak ditemukan.";
    }
    $stmt->close();
}

// Ambil semua data pegawai untuk ditampilkan dalam daftar
$daftar_pegawai = $conn->query("SELECT * FROM pegawai ORDER BY id ASC");

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f4; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        .detail-box { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc; max-width: 500px; margin-bottom: 20px; }
        .label { font-weight: bold; width: 120px; display: inline-block; }
        a.button { padding: 4px 10px; background: blue; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>

<h1>Daftar Pegawai</h1>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jabatan</th>
        <th>Aksi</th>
    </tr>
    <?php if ($daftar_pegawai->num_rows > 0): ?>
        <?php $no = 1; while ($row = $daftar_pegawai->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['nip']) ?></td>
                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                <td><a class="button" href="?id=<?= $row['id'] ?>">Lihat</a></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">Tidak ada data pegawai.</td></tr>
    <?php endif; ?>
</table>

<?php if ($pegawai_detail): ?>
    <div class="detail-box">
        <h2>Detail Pegawai</h2>
        <p><span class="label">Nama:</span> <?= htmlspecialchars($pegawai_detail['nama']) ?></p>
        <p><span class="label">NIP:</span> <?= htmlspecialchars($pegawai_detail['nip']) ?></p>
        <p><span class="label">Jabatan:</span> <?= htmlspecialchars($pegawai_detail['jabatan']) ?></p>
        <p><span class="label">Email:</span> <?= htmlspecialchars($pegawai_detail['email']) ?></p>
        <p><span class="label">Telepon:</span> <?= htmlspecialchars($pegawai_detail['telepon']) ?></p>
        <p><span class="label">Alamat:</span> <?= nl2br(htmlspecialchars($pegawai_detail['alamat'])) ?></p>
        <p><a class="button" href="pegawai.php">Tutup Detail</a></p>
    </div>
<?php elseif ($error): ?>
    <div class="detail-box">
        <p><?= htmlspecialchars($error) ?></p>
        <p><a class="button" href="pegawai.php">Kembali</a></p>
    </div>
<?php endif; ?>

</body>
</html>
