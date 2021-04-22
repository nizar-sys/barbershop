<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_barbershop");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function registrasi($data)
{
    global $koneksi;

    $user = strtolower(stripcslashes($data["username"]));
    $fullname = strtolower(stripcslashes($data["fullname"]));
    $pw = mysqli_real_escape_string($koneksi, $data["password1"]);
    $pw2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username tersedia
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$user'");
    if (mysqli_fetch_assoc($result)) {
        echo "<div class='container'><p class='flash-msg text-center' style='
        color: red;
        border: 1px solid;
    '>Username sudah tersedia!</p></div>";
        return false;
    }

    // cek konfirmasi password
    if ($pw !== $pw2) {
        echo "<div class='container'><p class='flash-msg text-center' style='
        color: red;
        border: 1px solid;
    '>Password tidak sesuai!</p></div>";
        return false;
    }

    // enkripsi password
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    // insert pw ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', DEFAULT, '$user', '$fullname', '$pw')");
    return mysqli_affected_rows($koneksi);
}

function flashmsg()
{
    $str =  `<div class="container">
                <div class="flash-msg" style="color: red;">
                    kono
                </div>
            </div>`;
    return $str;
}


// function tambahBooking($data)
// {
//     global $koneksi;
//     $tanggal = strtolower($data['tanggal']);
//     $jam = strtolower($data['jam']);
//     $nama = strtolower($data['nama']);

//     $query = "INSERT INTO booking VALUES('', '$nama', '$tanggal', '$jam', DEFAULT)";

//     mysqli_query($koneksi, $query);

//     return mysqli_affected_rows($koneksi);
// }
