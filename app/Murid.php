<?php
class Murid extends App
{
    // Tambah data murid
    public function tambahMurid($data)
    {
        // Ambil koneksi
        $conn = $this->getConn();
        // Ambil isi dara $_POST yang telah dikirim dan dibersihkan dari tag html
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $alamat = $this->_clearInputPost($data, 'alamat', $conn);
        $jenisKelamin = $this->_clearInputPost($data, 'jenis_kelamin', $conn);

        $foto = $this->_uploadFoto();

        if ($this->_validasi([$nama, $alamat, $jenisKelamin], 'validasi_murid')) {
            // Jika upload foto mengbalikan false pasti ada pesan yang ditampilakan
            // Agar pesan itu tampil maka eksekusi return false agar tidak pindah halaman dan insert data
            if (!$foto) {
                return false;
            }
            // Query
            mysqli_query($conn, "INSERT INTO murid VALUES(
                 null,'$nama','$alamat','$jenisKelamin','$foto'
             )");

            // Tampilkan pesan
            Message::setMassage('Data berhasil ditambahkan.', 'success', 'message_murid');
            // Redirect atau pindahkan
            header("Location: murid.php");
        }
    }

    public function ubahMurid($data)
    {
        $conn = $this->getConn();
        $id = $this->_clearInputPost($data, 'id', $conn);
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $alamat = $this->_clearInputPost($data, 'alamat', $conn);
        $jenisKelamin = $this->_clearInputPost($data, 'jenis_kelamin', $conn);
        $fotoLama = $this->_clearInputPost($data, 'fotoLama', $conn);

        if ($_FILES['foto']['error'] == 4) {
            $foto = $fotoLama;
        } else {
            $foto = $this->_uploadFoto();
        }

        if ($this->_validasi([$id, $nama, $alamat, $jenisKelamin], 'validasi_murid')) {
            if (!$foto) {
                return false;
            }
            // Query
            mysqli_query($conn, "UPDATE murid SET 
                 nama='$nama',
                 alamat='$alamat',
                 jenis_kelamin='$jenisKelamin',
                 foto = '$foto'
                 WHERE id=$id");

            // Tampilkan pesan
            Message::setMassage('Data berhasil diubah.', 'success', 'message_murid');
            // Redirect atau pindahkan
            header("Location: murid.php");
        }
    }

    public function hapusMurid($id)
    {
        $conn = $this->getConn();
        mysqli_query($conn, "DELETE FROM murid WHERE id=$id");
        Message::setMassage("Data berhasil dihapus.", 'success', 'message_murid');
    }

    private function _uploadFoto()
    {
        // Ambil data - data
        $namaFoto = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        $sizeFoto = $_FILES['foto']['size'];
        $eksFoto = explode('.', $namaFoto);
        $eksFoto = strtolower(end($eksFoto));
        $error = $_FILES['foto']['error'];

        $eksValid = ['jpg', 'jpeg', 'png'];

        // Jika tidak ada yang diupload maka foto yang upload foto defualt
        if ($error == 4) {
            $foto = 'default.jpg';
            $eksFoto = 'jpg';
        }
        if (!in_array($eksFoto, $eksValid)) {
            Message::setMassage("Extensi foto yang anda upload tidak diizinkan", 'danger', 'validasi_murid');
            return false;
        }
        if ($sizeFoto > 1000000) {
            Message::setMassage("Ukuran foto yang anda upload terlalu besar", 'danger', 'validasi_murid');
            return false;
        }

        if ($foto != 'default.jpg') {
            $namaFoto = date("ddmmyyyy") . uniqid() . '.' . $eksFoto;
            move_uploaded_file($tmpName, '../assets/img/murid/' . $namaFoto);
            $foto = $namaFoto;
        }

        return $foto;
    }
}
