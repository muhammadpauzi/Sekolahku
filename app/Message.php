<?php
class Message
{
    public static function setMassage($pesan, $warna, $nama)
    {
        $_SESSION[$nama] = [
            'pesan' => $pesan,
            'warna' => $warna
        ];
    }

    public static function showMessage($nama)
    {
        if (isset($_SESSION[$nama])) {
            echo '<div class="alert alert-' . $_SESSION[$nama]['warna']  . '" role="alert">
                    ' . $_SESSION[$nama]['pesan'] . '
            </div>';
            unset($_SESSION[$nama]);
        }
    }
}
