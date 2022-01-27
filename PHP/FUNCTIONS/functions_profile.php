<?php
// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW PROFILE
function showProfile($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW PROFILE \\

// EDIT PROFILE
function editProfile($edit)
{

    global $connect;

    $PkIdUsers          = $edit['pk_id_users'];
    $username           = htmlspecialchars($edit['username']);
    $fullName           = htmlspecialchars($edit['full_name']);
    $placeOfBrtih       = htmlspecialchars($edit['place_of_brith']);
    $dateOfBrith        = date('Y-m-d', strtotime(htmlspecialchars($edit['date_of_brith'])));
    $gender             = htmlspecialchars($edit['gender']);
    $email              = htmlspecialchars($edit['email']);
    $phoneNumber        = htmlspecialchars($edit['phone_number']);
    $address            = htmlspecialchars($edit['address']);
    $updatedBy          = htmlspecialchars($edit['updated_by']);
    $updatedAt          = date('Y-m-d');
    $currentPhoto       = $edit['current_photo'];

    if ($_FILES['photo']['error'] === 4) {
        $photo          = $currentPhoto;
    } else {
        $photo          = changePhoto();
    }

    mysqli_query($connect, "UPDATE      m_users 
                                SET     username        = '$username',
                                        full_name       = '$fullName',
                                        place_of_brith  = '$placeOfBrtih',
                                        date_of_brith   = '$dateOfBrith',
                                        gender          = '$gender',
                                        email           = '$email',
                                        phone_number    = '$phoneNumber',
                                        address         = '$address',
                                        updated_by      = '$updatedBy',
                                        updated_at      = '$updatedAt',
                                        photo           = '$photo'
                                WHERE   pk_id_users     = '$PkIdUsers'");

    return mysqli_affected_rows($connect);
}

function changePhoto()
{
    $photoName    = $_FILES['photo']['name'];
    $folderName   = $_FILES['photo']['tmp_name'];

    move_uploaded_file($folderName, '../../DATABASE/IMAGE/' . $photoName);
    return $photoName;
}
// EDIT PROFILE \\

// CHANGE PASSWORD
function chagePassword($change)
{
    global $connect;

    $PkIdUsers              = $change['pk_id_users'];
    $passInDb               = $change['pass_in_db'];
    $currentPassword        = htmlspecialchars($change['currentPassword']);

    if ($passInDb == hash('sha256', $currentPassword)) {

        $newPassword            = htmlspecialchars($change['newPassword']);
        $confirmNewPassword     = htmlspecialchars($change['confirmNewpassword']);
    } else {
        echo "
        <script>
            alert ('Your old password is wrong !!!');
        </script>";
        return false;
    }

    if ($newPassword == $confirmNewPassword) {

        $password = hash('sha256', $confirmNewPassword);
        $updatedBy          = htmlspecialchars($change['updated_by']);
        $updatedAt          = date('Y-m-d');
    } else {
        echo "
        <script>
            alert ('New password and confirm your password is different !!!');
        </script>";
        return false;
    }

    mysqli_query($connect, "UPDATE m_users  SET     password    = '$password', 
                                                    updated_by  = '$updatedBy',
                                                    updated_at  = '$updatedAt'
                                            WHERE   pk_id_users = '$PkIdUsers'");

    return mysqli_affected_rows($connect);
}
// CHANGE PASSWORD \\
