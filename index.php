<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>

<body>
<header>
</header>
<main>
    <div class="form container mt-3 d-flex justify-content-center align-items-center flex-column">
        <h2 align="center">Masukan Data Siswa</h2>
        <div class="form_container"></div>    
        <form  method="POST" action="">
            <table class="table table-bordered table-striped table-hover table-responsive text-center">
                <tr>
                    <td><label for="Nama">NAMA :</label><br> </td>
                    <td><input type="text" name="nama" placeholder="nama" required><br></td>
                </tr>
                <tr>
                    <td><label for="NIS">Nis :  </label><br></td>
                    <td><input type="number" name="nis" placeholder="nis" required><br></td>
                </tr>
                <tr>
                    <td><label for="Rayon">Rayon :</label><br></td>
                    <td><input type="text" name="rayon" placeholder="rayon" required><br></td>
                </tr>
                <tr>
                    <td><input class="btn btn-primary" type="submit" name="submit"><br></td>
                </tr>
            </table>
        </form>
    </div>

    <?php 
    session_start();
    if(!isset($_SESSION['datasiswa'])) {
        $_SESSION['datasiswa']=array();
    }

    if(isset($_POST['submit'])) {
        if(@$_POST['nama'] && @$_POST['nis'] && @$_POST['rayon']) {
            $data =[
                'nama' => $_POST['nama'],
                'nis' => $_POST['nis'],
                'rayon' => $_POST['rayon']
            ];
            array_push($_SESSION['datasiswa'], $data);
        }
    }

    if(!empty($_SESSION['datasiswa'])) {
        echo '<table border="1" align="center">';
        echo '<tr>';
        echo '<td>NAMA</td>';
        echo '<td>Nis</td>';
        echo '<td>RAYON</td>';
        echo '<td>Aksi</td>';
        echo '</tr>';
        foreach($_SESSION['datasiswa'] as $index => $value) {
        echo '<tr>';
        echo '<td>'.$value['nama'] . '</td>';
        echo '<td>'.$value['nis'] . '</td>';
        echo '<td>'.$value['rayon'] . '</td>';
        echo '<td><form method="POST" action=""><input type="hidden" name="index" value="'.$index.'"><input type="submit" name="hapus" value="Hapus"></form></td>';
        echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Tidak ada data ';
    }

    if(isset($_POST['hapus'])) {
        $index = $_POST['index'];
        unset($_SESSION['datasiswa'][$index]);
        $_SESSION['datasiswa'] = array_values($_SESSION['datasiswa']);
        header("Refresh:0");
    }
    ?>
</main>
<footer>
</footer>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
</body>
</html>
