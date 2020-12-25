<?php
class Auth extends App
{
    private $password;
    public function register($data)
    {
        $conn = $this->getConn();
        $username = $this->_clearInputPost($data, 'username', $conn);
        $namaPanjang = $this->_clearInputPost($data, 'namaPanjang', $conn);
        $this->password = $this->_clearInputPost($data, 'password', $conn);
        $ulangPassword = $this->_clearInputPost($data, 'ulangPassword', $conn);

        if ($this->_validasi([$username, $namaPanjang, $this->password, $ulangPassword], 'validasi_register')) {
            if (!$this->_registerValidasi($username, $this->password, $ulangPassword)) {
                return false;
            }

            mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$username','$namaPanjang','$this->password')");
            Message::setMassage("Register berhasil, silahkan login", "success", "message_login");
            header("Location: login.php");
        }
    }

    private function _registerValidasi($username, $password, $ulangPassword)
    {
        if (count($this->query("SELECT * FROM user WHERE username='$username'")) > 0) {
            Message::setMassage("Username telah terdaftar.", 'danger', 'validasi_register');
            return false;
        }

        if (strlen($password) < 10) {
            Message::setMassage("Password terlalu pendek.", 'danger', 'validasi_register');
            return false;
        }

        if ($ulangPassword != $password) {
            Message::setMassage("Password tidak sama dengan ulang password.", 'danger', 'validasi_register');
            return false;
        }

        // enkripsi password
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return true;
    }

    public function login($data)
    {
        $conn = $this->getConn();
        $username = $this->_clearInputPost($data, 'username', $conn);
        $password = $this->_clearInputPost($data, 'password', $conn);

        if ($this->_validasi([$username, $password], 'message_login')) {
            if (count($this->query("SELECT * FROM user WHERE username='$username'")) === 1) {
                $passwordHash = $this->query("SELECT `password` FROM user WHERE username='$username'")[0];
                if (password_verify($password, $passwordHash['password'])) {
                    $_SESSION['is_login'] = true;
                    // Message::setMassage("Login berhasil", 'success', 'message_murid');
                    header("Location: ../index.php");
                } else {
                    Message::setMassage("Password yang anda masukan salah", 'danger', 'message_login');
                }
            } else {
                Message::setMassage("Username yang anda masukan salah", 'danger', 'message_login');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['is_login']);

        Message::setMassage("Log out berhasil", 'success', 'message_login');
        header("Location: login.php");
    }
}
