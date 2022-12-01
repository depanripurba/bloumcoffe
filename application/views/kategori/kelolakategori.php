<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori</title>
</head>
<body>
    <div>
        <form action="<?=base_url('admincontroller/postkategori')?>" method="post">
            <input type="text" name="namaKategori" placeholder="Nama Kategori Baru">
            <button type="submit" name="submit">Tambahkan Kategori Baru</button>
        </form>
    </div>
    <table border>
        <tr>
            <td>No</td>
            <td>Nama Kategori</td>
            <td>Aksi</td>
        </tr>
        <?php $nomor = 1 ?>
        <?php foreach($kategori as $data):?>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$data->kategori ?></td>
            <td><a href="../hapuskategori/<?=$data->id_kategori?>">Hapus</a> <a href="">Ubah</a></td>
        </tr>
        <?php $nomor++?>
        <?php endforeach; ?>
    </table>
</body>
</html>