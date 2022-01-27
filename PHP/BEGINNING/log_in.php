<?php
session_start();
include('../CONFIG/connect_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username      = htmlspecialchars($_POST['username']);
        $passwordUser   = htmlspecialchars($_POST['password']);

        $query = "SELECT * FROM m_users 
                INNER JOiN m_positions ON m_users.fk_id_positions = m_positions.pk_id_positions
                WHERE username = '" . $username . "'";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $dataUser = mysqli_fetch_assoc($result);
        } else {
            $erorAuthUserNotFound = true;
        }
        mysqli_close($connect);

        if ($username == $dataUser['username'] && hash('sha256', $passwordUser) == $dataUser['password']) {
            $_SESSION['username'] = $dataUser['username'];
            $_SESSION['full_name'] = $dataUser['full_name'];
            $_SESSION['pk_id_users'] = $dataUser['pk_id_users'];
            $_SESSION['position_name'] = $dataUser['position_name'];
            if (isset($_POST['remember'])) {
                setcookie('login', $dataUser['username'], time() + 120, '/');
            }
            if ($_SESSION['position_name'] == "Cashier") {
                header("location: ../LAYOUTS/main.php?page=Home");
            }
            if ($_SESSION['position_name'] == "Admin") {
                header("location: ../LAYOUTS/main.php?page=Report");
            }
        } else {
            $erorAuth = true;
        }
    } else {
        $eror = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to Laundry&trade;</title>
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/beginning.css">
    <!-- /LINK CSS -->
    <!-- LINK LOGO -->
    <link rel="shortcut icon" href="../../ASSET/LOGO/johnny-automatic-Services-5.svg">
    <!-- /LINK LOGO -->
</head>

<body>
    <div class="countainer con_all">
        <div class="row receptacle_login shadow">
            <div class="col-md-6">
                <img src="../../ASSET/FOTO/alexandra-poliakova-EXCroywwrEw-unsplash.jpg" class="img-fluid img_washing_machine">
            </div>
            <div class="col-md-6">
                <?php if (isset($eror)) : ?>
                    <p style="color: red;">TOLONG USERNAME DAN PASSWORD DIISI !!!</p>
                <?php endif; ?>
                <?php if (isset($erorAuth)) : ?>
                    <p style="color: red;">USERNAME DAN PASSWORD TIDAK COCOK !!!</p>
                <?php endif; ?>
                <?php if (isset($erorAuthUserNotFound)) : ?>
                    <p style="color: red;">USERNAME TIDAK TERDAFTAR DI SISTEM !!!</p>
                <?php endif; ?>
                <form class="form_login" action="" method="POST">
                    <img class="mb-4 img_logo_login" src="../../ASSET/LOGO/johnny-automatic-Services-5.svg">
                    <h2 class="txt_label_login">Laundry&trade;</h2>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="floatingInput" autocomplete="off" name="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-2">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn_login mb-2" type="submit" name="submit">Log in</button>
                    <a class="btn_forgot_password" href="../BEGINNING/forgot_password.php">Forgot password?</a>
                    <p class="txt_copyright_login">&copy;2021 Laundry&trade;</p>
                </form>
            </div>
        </div>
        <!-- LINK JAVASCRIPT -->
        <script src="../../JS/bootstrap.js"></script>
        <!-- /LINK JAVASCRIPT -->
</body>

</html>