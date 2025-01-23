<?php
// connect data base
$conn = mysqli_connect("localhost", "root", "", "florera");

// connect database
function query($query)
{
    global $conn;
    $result  = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// register
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));

    $email = strtolower(trim(stripslashes($data["email"])));

    // tes email
    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "Email is valid: " . $email; // Output: email is valid: testemail@example.com
    // } else {
    //     echo "Invalid email format.";
    // }

    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo  "<script>
        alert('username sudah terdaftar');
    </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Password tidak sesuai');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // menambahkan user baru ke data base
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$email', '$password')");
    return mysqli_affected_rows($conn); // apakan menghasilkan angka 1 jika berhasil dan angka -1 jika gagal
}
