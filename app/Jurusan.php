<?php
class Jurusan extends App
{
    public function hapusJurusan($id)
    {
        $conn = $this->getConn();
        mysqli_query($conn, "DELETE FROM jurusan WHERE id=$id");
        Message::setMassage("Data berhasil dihapus.", 'success', 'message_jurusan');
    }

    public function tambahJurusan($data)
    {
        $conn = $this->getConn();
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $kepalaJurusan = $this->_clearInputPost($data, 'kepala_jurusan', $conn);

        if ($this->_validasi([$nama, $kepalaJurusan], 'validasi_jurusan')) {
            mysqli_query($conn, "INSERT INTO jurusan VALUES(
                null,'$nama','$kepalaJurusan'
            )");

            Message::setMassage("Data berhasil ditambahkan", 'success', 'message_jurusan');
            header("Location: jurusan.php");
        }
    }

    public function ubahJurusan($data)
    {
        $conn = $this->getConn();
        $id = $this->_clearInputPost($data, 'id', $conn);
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $kepalaJurusan = $this->_clearInputPost($data, 'kepala_jurusan', $conn);

        if ($this->_validasi([$id, $nama, $kepalaJurusan], 'validasi_jurusan')) {
            mysqli_query($conn, "UPDATE jurusan SET 
            nama='$nama',
            kepala='$kepalaJurusan'
            WHERE id=$id");

            Message::setMassage("Data berhasil diubah", 'success', 'message_jurusan');
            header("Location: jurusan.php");
        }
    }
}
