<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
</head>
<body>
    <h1>Daftar Kendaraan</h1>
    <a href="/kendaraan/create">Tambah Kendaraan</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Plat Nomor</th>
                <th>Jenis Kendaraan</th>
                <th>User ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kendaraans as $kendaraan): ?>
                <tr>
                    <td><?= $kendaraan['kendaraan_id'] ?></td>
                    <td><?= $kendaraan['plat_nomor'] ?></td>
                    <td><?= $kendaraan['jenis_kendaraan'] ?></td>
                    <td><?= $kendaraan['user_id'] ?></td>
                    <td>
                        <a href="/kendaraan/delete/<?= $kendaraan['kendaraan_id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>