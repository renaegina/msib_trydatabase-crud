<?php
include_once("connection.php");

//Fungsi tombol simpan
if (isset($_POST['bambil'])) {

  //Apakah data akan diedit atau disimpan
  if (isset($_GET['ket']) == "edit") {

    //Data edit
    $edit = mysqli_query($mysqli, "UPDATE mahasiswa SET
                                      nim = '$_POST[tnim]',
                                      semester = '$_POST[tsemester]',
                                      kode = '$_POST[tkode]',
                                      mata_kuliah = '$_POST[tmatkul]',
                                      tipe_kelas= '$_POST[ttipe]'
                                    WHERE id_mahasiswa = '$_GET[id]'
                                  ");
    //Kondiisi jika data edit sukses
    if ($edit) {
      echo "<script>
                alert('Edit Data Sukses!');
                document.location='index.php';
              </script";
    } else {
      echo "<script>
                alert(Edit Data Sukses!');
                document.location='index.php';
              </script";
    }
  } else {
    //Data akan disimpan
    $ambil = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama, nim, semester, kode, mata_kuliah, tipe_kelas)
                                  VALUE('$_POST[tnama]',
                                        '$_POST[tnim]',
                                        '$_POST[tsemester]',
                                        '$_POST[tkode]',
                                        '$_POST[tmatkul]',
                                        '$_POST[ttipe]')
                        ");

    //Kondisi jika data ambil sukses
    if ($ambil) {
      echo "<script>
              alert('Sukses Mengambil Mata Kuliah!');
              document.location='index.php';
              </script";
    } else {
      echo "<script>
              alert('Gagal Mengambil Mata Kuliah!');
              document.location='index.php';
              </script";
    }
  }
}

//Deklarasi variabel menampung data yang akan diedit, yang dimana "v" mewakili variabel
$vnama = "";
$vnim = "";
$vsemester = "";
$vkode = "";
$vmatkul = "";
$vtipe = "";

//Jika tombol edit dan delete di klik
if (isset($_GET['ket'])) {

  //Edit data
  if ($_GET['ket'] == "edit") {

    //Tampilkan data yang akan diedit
    $tampil = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$_GET[id]' ");
    $data = mysqli_fetch_array($tampil);
    if ($data) {

      //Jika data ditemukan, maka data akan ditampung ke dalam variabel
      $vnama = $data['nama'];
      $vnim = $data['nim'];
      $vsemester = $data['semester'];
      $vkode = $data['kode'];
      $vmatkul = $data['mata_kuliah'];
      $vtipe = $data['tipe_kelas'];
    }
  } else if ($_GET['ket'] == "delete") {
    //Hapus data
    $delete = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_GET[id]' ");

    //Kondisi jika data ambil sukses
    if ($delete) {
      echo "<script>
            alert('Hapus data Sukses!');
            document.location='index.php';
            </script";
    } else {
      echo "<script>
            alert('Hapus data Gagal!');
            document.location='index.php';
            </script";
    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <title>Try Database - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="Image/univ.ico">
</head>

<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid d-flex align-items-center">
        <a class="navbar-brand" href="#">
            <div class="d-flex align-items-center">
                <img src="Image/univ.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                <div class="ml-2 d-flex flex-column">
                    <span style="font-size: 18px; font-weight: 650; color: white; margin-left: 13px; margin-bottom: -8px;">SATU Mahasiswa</span>
                    <span style="font-size: 12px; font-weight: 500; color: white; margin-left: 13px;">Universitas Sumatera Utara</span>
                </div>
            </div>
        </a>
    </div>
</nav>

  <!--Awal container-->
  <div class="container">
    <!--Awal row-->
    <div class="row">
      <!--Awal col-->
      <div class="col-md-8 mx-auto">
        <!--Awal card-->
        <div class="card">
          <div class="card-header bg-success text-light">
            Kelola KRS
          </div>
          <div class="card-body">
            <!--Awal form-->
            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="tnama" value="<?= $vnama ?>" class="form-control" placeholder="Masukkan Nama Mahasiswa">
              </div>

              <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="tnim" value="<?= $vnim ?>" class="form-control" placeholder="Masukkan NIM">
              </div>

              <div class="mb-3">
                <label class="form-label">Semester</label>
                <select class="form-select" name="tsemester">
                  <option value="<?= $vsemester ?>"><?= $vsemester ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" name="tkode" value="<?= $vkode ?>" class="form-control" placeholder="Kode Mata Kuliah">
                  </div>
                </div>

                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select class="form-select" name="tmatkul">
                      <option value="<?= $vmatkul ?>"><?= $vmatkul ?></option>
                      <option value="Agama Khatolik">Agama Khatolik</option>
                      <option value="Praktikum Manajemen Sistem Basis Data">Praktikum Manajemen Sistem Basis Data</option>
                      <option value="Praktikum Manajemen Proyek IT">Praktikum Manajemen Proyek IT</option>
                      <option value="Praktikum Agama Katolik">Praktikum Agama Katolik</option>
                      <option value="Praktikum Agama Kristen Protestan">Praktikum Agama Kristen Protestan</option>
                      <option value="Praktikum Dasar Dasar Pemrograman">Praktikum Dasar Dasar Pemrograman</option>
                      <option value="Praktikum Sistem Informasi Geografis">Praktikum Sistem Informasi Geografis</option>
                      <option value="Praktikum E-Application">Praktikum E-Application</option>
                      <option value="Logika Matematika">Logika Matematika</option>
                      <option value="Pengantar Teknologi Informasi">Pengantar Teknologi Informasi</option>
                      <option value="Otomatisasi Perkantoran">Otomatisasi Perkantoran</option>
                      <option value="Dasar Dasar Pemrograman">Dasar Dasar Pemrograman</option>
                      <option value="Bahasa Inggris">Bahasa Inggris</option>
                      <option value="Praktikum Teknik Penulisan Karya Ilmiah">Praktikum Teknik Penulisan Karya Ilmiah</option>
                      <option value="Praktikum Pemrograman Visual">Praktikum Pemrograman Visual</option>
                      <option value="Praktikum Pemrograman Web I">Praktikum Pemrograman Web I</option>
                      <option value="Praktikum Pemrograman Mobile">Praktikum Pemrograman Mobile</option>
                      <option value="Praktikum Jaringan Komputer">Praktikum Jaringan Komputer</option>
                      <option value="Praktikum Multimedia II">Praktikum Multimedia II</option>
                      <option value="Praktikum Sistem Basis Data">Praktikum Sistem Basis Data</option>
                      <option value="Praktikum Agama Islam">Praktikum Agama Islam</option>
                      <option value="Agama Islam">Agama Islam</option>
                      <option value="Tugas Akhir">Tugas Akhir</option>
                      <option value="Sistem Basis Data14">Sistem Basis Data</option>
                      <option value="Multimedia II">Multimedia II</option>
                      <option value="Sistem Pendukung Keputusan">Sistem Pendukung Keputusan</option>
                      <option value="E-Application">E-Application</option>
                      <option value="Pemrograman Mobile4">Pemrograman Mobile</option>
                      <option value="Jaringan Komputer">Jaringan Komputer</option>
                      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                      <option value="Pemrograman Web I">Pemrograman Web I</option>
                    </select>
                  </div>

                </div>


                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Tipe Kelas</label>
                    <select class="form-select" name="ttipe">
                      <option value="<?= $vtipe ?>"><?= $vtipe ?></option>
                      <option value="Reguler">Reguler</option>
                      <option value="MKWU">MKWU</option>
                      <option value="MKWK">MKWK</option>
                    </select>
                  </div>
                </div>

                <div class="text-center">
                  <hr>
                  <button class="btn btn-primary" name="bambil" type="submit">Ambil</button>
                  <button class="btn btn-danger" name="breset" type="reset">Reset</button>
                </div>
              </div>
              

            </form>
            <!--Akhir form-->
          </div>
          <div class="card-footer bg-success">
          </div>
        </div>
        <!--Akhir card-->
      </div>
      <!--Akhir col-->
    </div>
    <!--Akhir row-->

    <!--Awal card-->
    <div class="card mt-3">
      <div class="card-header bg-success text-light">
        Mata Kuliah Diambil
      </div>
      <div class="card-body">

        <table class="table center-text table-hover border-success">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Semester</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>Tipe Kelas</th>
            <th>Tanggal Simpan</th>
            <th>Kelola</th>
          </tr>

          <?php
          //Menampilkan data
          $no = 1;

          //Pencarian mata kuliah
          if (isset($_POST['bcari'])) {
            $keyword = $_POST['tcari'];
            $q = "SELECT * FROM mahasiswa WHERE kode like '%$keyword%' or nama like '%$keyword%' or nim like '%$keyword%' or mata_kuliah like '%$keyword%' order by id_mahasiswa desc ";
          } else {
            $q = "SELECT * FROM mahasiswa order by id_mahasiswa desc";
          }

          $tampil = mysqli_query($mysqli, $q);
          while ($data = mysqli_fetch_array($tampil)) :

          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['nim'] ?></td>
              <td><?= $data['semester'] ?></td>
              <td><?= $data['kode'] ?></td>
              <td><?= $data['mata_kuliah'] ?></td>
              <td><?= $data['tipe_kelas'] ?></td>
              <td><?= $data['tanggal_simpan'] ?></td>
              <td>
                <a href="index.php?ket=edit&id=<?= $data['id_mahasiswa'] ?>" class="btn btn-warning">Edit</a>
                <a href="index.php?ket=delete&id=<?= $data['id_mahasiswa'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a>
              </td>
            </tr>

          <?php endwhile;
          ?>

        </table>
      </div>
      <div class="card-footer bg-success">
      </div>
      <!--Akhir card-->
    </div>

  </div>
  <!-Akhir container-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>