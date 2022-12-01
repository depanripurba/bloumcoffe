<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kelola Menu</title>
</head>

<body>
    <h1>Selamat datang di halaman kelola menu</h1>
    <form action="./AdminController/insertmenu" method="POST" enctype="multipart/form-data">
        <input type="text" name="namamenu" placeholder="Input nama menu..">
        <select name="kategori" id="tes">
            <?php foreach($kategori as $data): ?>
            <option value="<?=$data->kategori?>"><?=$data->kategori?></option>
            <?php endforeach?>
        </select>
        <input type="text" name="harga" placeholder="harga..">
        <input type="file" name="menu" placeholder="upload file gambar">
        <button name="submit" type="submit">Tambah</button>
    </form>
</body>

</html>