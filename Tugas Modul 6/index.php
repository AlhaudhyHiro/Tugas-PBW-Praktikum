<?php include('domain/get_data.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Pengisian KRS</title>
</head>


<body>
    <nav class="navbar navbar-light bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Assets/Logo Fakultas (1).png" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                FASILKOM UNSIKA
            </a>
        </div>
    </nav>

    <h1 class="text-center pt-4">Pengisian KRS Mahasiswa Fasilkom Unsika</h1>
    <br>

    <div class="card">
        <div class="card-header text-black" style="background-color: azure;">
            Silahkan Masukan Data</div>
        <div class="card-body">
            <form action="domain/post_data.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nomor Pokok Mahasiswa</label>
                    <input type="number" id="tnpm" name="tnpm" class="form-control" placeholder="Masukan Nomor"
                        required>
                </div>
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" id="tnama" name="tnama" class="form-control" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" id="talamat" name="talamat" placeholder="Masukan Alamat"></textarea>
                </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <select class="form-control" id="tprodi" name="tprodi">
                        <option></option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <select class="form-control" id="tmk" name="tmk">
                        <option></option>
                        <option value="Pemrograman Berbasis Web">Pemrograman Berbasis Web</option>
                        <option value="Analisis Desain Algoritma">Analisis Desain Algoritma</option>
                        <option value="Embedded System">Embedded System</option>
                        <option value="Statistika dan Probabilitas">Statistika dan Probabilitas</option>
                        <option value="Operating System">Operating System</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah SKS yang Diambil</label>
                    <select class="form-control" id="tsks" name="tsks">
                        <option></option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <br>
                <button type="Input Data" class="btn btn-success" name="binput">Masukan Data</button>
        </div>
        </form>
    </div>

    <div class="container">
        <?php
    if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo  $message;
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}
?>
    </div>


    <div class="card">
        <div class="card-header bg-secondary text-white">
            Database
        </div>
        <div class="card-body">
            <table class="table table-striped" id='table-data'>
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            if (!isset($query)) {
                                echo "Database Kosong";
                            } else {
                                while ($row = mysqli_fetch_assoc($run)){
                                    echo '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['nama'] . '</td>
                                    <td>' . $row['nama_mk'] . '</td>
                                    <td>' . "<span style='color:palevioletred;font-weight:bolder;'>".$row['nama']."</span>". ' Mata Kuliah Yang Diambil ' . "<span style='color:palevioletred;font-weight:bolder;'>" . $row['nama_mk'] ."</span>". " ( ".$row['jumlah_sks'] . ' SKS )' . '</td> 
                                    </tr>';
                                }
                            } ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>