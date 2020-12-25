<?php


class Guru extends App
{
    public function tambahGuru($data)
    {
        $conn = $this->getConn();
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $alamat = $this->_clearInputPost($data, 'alamat', $conn);
        $jenisKelamin = $this->_clearInputPost($data, 'jenis_kelamin', $conn);

        if ($this->_validasi([$nama, $alamat, $jenisKelamin], 'validasi_guru')) {
            mysqli_query($conn, "INSERT INTO guru VALUES(
                null,'$nama','$alamat','$jenisKelamin'
            )");

            Message::setMassage("Data berhasil ditambahkan", 'success', 'message_guru');
            header("Location: guru.php");
        }
    }

    public function hapusGuru($id)
    {
        $conn = $this->getConn();
        mysqli_query($conn, "DELETE FROM guru WHERE id=$id");
        Message::setMassage("Data berhasil dihapus.", 'success', 'message_guru');
    }

    public function ubahGuru($data)
    {
        $conn = $this->getConn();
        $id = $this->_clearInputPost($data, 'id', $conn);
        $nama = $this->_clearInputPost($data, 'nama', $conn);
        $alamat = $this->_clearInputPost($data, 'alamat', $conn);
        $jenisKelamin = $this->_clearInputPost($data, 'jenis_kelamin', $conn);

        if ($this->_validasi([$id, $nama, $alamat, $jenisKelamin], 'validasi_guru')) {
            mysqli_query($conn, "UPDATE guru SET 
            nama='$nama',
            alamat='$alamat',
            jenis_kelamin='$jenisKelamin'
            WHERE id=$id");

            Message::setMassage("Data berhasil diubah", 'success', 'message_guru');
            header("Location: guru.php");
        }
    }
}
