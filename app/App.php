<?php

class App
{
    protected function getConn()
    {
        return mysqli_connect("Localhost", "root", "", "db_sekolahku");
    }

    public function query($query)
    {
        // Ambil koneksi
        $conn = $this->getConn();
        // query
        $result = mysqli_query($conn, $query);
        // Buat variabel yang berisi array kosong agar jika isi $result kosong maka tidak terjadi error saat melooping data
        $rows = [];
        // ambil data tipe array associative
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function cari($keyword, $tabel)
    {
        if ($tabel === 'jurusan') {
            return $this->query(
                "SELECT * FROM $tabel WHERE
                nama LIKE '%$keyword%' OR
                kepala LIKE '%$keyword%'"
            );
        } else {
            return $this->query(
                "SELECT * FROM $tabel WHERE
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%'"

            );
        }
    }

    public function is_login()
    {
        if (!isset($_SESSION['is_login'])) {
            header("Location: ../auth/login.php");
            return true;
        }
        return false;
    }

    protected function _validasi($input, $namaMessage)
    {
        foreach ($input as $i) {
            if (empty($i)) {
                Message::setMassage("Input harus diisi", 'danger', $namaMessage);
                return false;
            }
        }

        return true;
    }

    protected function _clearInputPost($data, $nameInput, $conn)
    {
        return mysqli_real_escape_string($conn, stripslashes(htmlspecialchars($data[$nameInput])));
    }
}
