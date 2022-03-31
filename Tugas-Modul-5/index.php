<?php

$file = 'database.json';
$data = array();
$file_json = file_get_contents($file);
$data = json_decode($file_json, true);

$maskapai = Array('Garuda Indonesia', 'Lion Air', 'Qatar Airways', 'Etihad Airways', 'Emirates Airways');

$keberangkatan = Array(
    "Jakarta - Soekarno Hatta" => 200000,
    "Majalengka - Kertapati" => 250000,
    "Batam - Hang Nadim" => 500000,
    "Yogyakarta - New Yogyakarta International Airport" => 300000,
    "Bali- I Gusti Ngurah Rai" => 650000,
    "Lampung - Radin Inten II" => 400000,
    "Makassar- Sultan Hasanuddin" => 800000,
    "Manado - Sam Ratulangi" => 1000000
);


$kedatangan = Array(
    "Jakarta - Soekarno Hatta" => 200000,
    "Majalengka - Kertapati" => 250000,
    "Batam - Hang Nadim" => 500000,
    "Yogyakarta - New Yogyakarta International Airport" => 300000,
    "Bali- I Gusti Ngurah Rai" => 650000,
    "Lampung - Radin Inten II" => 400000,
    "Makassar- Sultan Hasanuddin" => 800000,
    "Manado - Sam Ratulangi" => 1000000
);
function getPajakKeberangkatan($keberangkatan, $kedatangan)
{
    $pajak = $keberangkatan[$kedatangan];
    return $pajak;
}

function getPajakKedatangan($keberangkatan, $kedatangan)
{
    $pajak = $keberangkatan[$kedatangan];
    return $pajak;
}

if (isset($_POST['Registrasi'])) {
  $tax = getPajakKeberangkatan($keberangkatan, $_POST['Keberangkatan']) + getPajakKedatangan($kedatangan, $_POST['Kedatangan']);
  $jumlah = $pajak + $_POST['Harga'];

  $data_penerbangan = array(
    "Maskapai Penerbangan" => $_POST['Maskapai Penerbangan'],
    "Keberangkatan" => $_POST['Keberangkatan'],
    "Kedatangan" => $_POST['Kedatangan'],
    "Harga" => $_POST['Harga'],
    "Pajak" => $pajak,
    "Jumlah yang dibayarkan" => $jumlah
  );
 
  array_push($data, $data_penerbangan);
  $data_json = json_encode($data, JSON_PRETTY_PRINT);
  file_put_contents($file, $data_json);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Input Data Penerbangan</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #87cefa">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/pngwing.com.png" alt="logo" width="30" class="d-inline-block align-text-top">
                Dinas Perjalanan Udara
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#homepage">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#input">Input Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#output">Output Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="homepage" class="homepage" style="background-color:azure">
        <div class="row text-center pt-5 pb-5" data-aos="fade-right" data-aos-duration="1000">
            <div class="col"></div>
            <h2>Homepage</h2>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Assets/1.jpg" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="Assets/2.jpg" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item">
                    <img src="Assets/3.jpg" class="d-block w-100" alt="3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="input" class="input" style="background-color:azure">
        <div class="row text-center pt-5 pb-2" data-aos="fade-right" data-aos-duration="1000">
            <div class="col"></div>
            <h2>Input Data</h2>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-md-7 pb-5">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="col-sm-12">
                                <label class="form-label" for="Maskapai Penerbangan">Pilih Maskapai yang Akan Digunakan
                                    :</label><br>
                                <select class="form-select" name="Maskapai" id="Maskapai">
                                    <option selected>{Pilih Maskapai}</option>
                                    <?php foreach ($maskapai as $penerbangan) : ?>
                                    <option value="<?= $penerbangan ?>"><?= $penerbangan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="Pemberangkatan">Pilih Bandara Keberangkatan:</label><br>
                                <select class="form-select" name="Pemberangkatan" id="Pemberangkatan">
                                    <option selected>Bandara Keberangkatan</option>
                                    <?php foreach ($keberangkatan as $bandara_keberangkatan => $tax) : ?>
                                    <option value="<?= $bandara_keberangkatan ?>"><?= $bandara_keberangkatan; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="Kedatangan">Pilih Bandara Kedatangan:</label><br>
                                <select class="form-select" name="Kedatangan" id="Kedatangan">
                                    <option selected>Bandara Kedatangan</option>
                                    <?php foreach ($kedatangan as $bandara_kedatangan => $tax) : ?>
                                    <option value="<?= $bandara_kedatangan ?>"><?= $bandara_kedatangan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="harga" class="form-label">Harga Penerbangan (Belum Termasuk Pajak)</label>
                                <input type="number" class="form-control" name="harga" id="harga"
                                    placeholder="Harga (Rp. )" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#87cefa" fill-opacity="1"
                    d="M0,288L18.5,256C36.9,224,74,160,111,144C147.7,128,185,160,222,149.3C258.5,139,295,85,332,96C369.2,107,406,181,443,181.3C480,181,517,107,554,64C590.8,21,628,11,665,42.7C701.5,75,738,149,775,192C812.3,235,849,245,886,250.7C923.1,256,960,256,997,224C1033.8,192,1071,128,1108,128C1144.6,128,1182,192,1218,186.7C1255.4,181,1292,107,1329,85.3C1366.2,64,1403,96,1422,112L1440,128L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z">
                </path>
            </svg>
    </section>


    <section id="output" class="output" style="background-color:azure">
        <div class="row text-center pt-2 pb-2" data-aos="fade-right" data-aos-duration="1000">
            <div class="col"></div>
            <h2>Output Data</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Maskapai Penerbangan</th>
                    <th scope="col">Keberangkatan</th>
                    <th scope="col">Kedatangan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $hasil => $value): ?>
                <tr>
                    <td><?= $data[$hasil]['Maskapai Penerbangan']; ?></td>
                    <td><?= $data[$hasil]['Keberangkatan']; ?></td>
                    <td><?= $data[$hasil]['Kedatangan']; ?></td>
                    <td><?= $data[$hasil]['Harga']; ?></td>
                    <td><?= $data[$hasil]['Pajak']; ?></td>
                    <td><?= $data[$hasil]['Total']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>