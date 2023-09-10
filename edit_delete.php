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
