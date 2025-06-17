<?php
// koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_pegawai");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ambil data pegawai
$sql = "SELECT * FROM pegawai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.button { padding: 6px 12px; background: blue; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Daftar Pegawai</h1>
    <a href="tambah.php" class="button">Tambah Pegawai</a>
    <br><br>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama pegawai']) ?></td>
                <td><?= htmlspecialchars($row['pangkat']) ?></td>
                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                <td><?= htmlspecialchars($row['aksi']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Tidak ada data pegawai.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
