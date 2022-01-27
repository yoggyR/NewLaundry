<?php
// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW USERS
function showUsers($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW USERS \\

// ADD USER
function addDataUSer($dataUser)
{
    global $connect;

    $fk_id_positions    = htmlspecialchars($dataUser['fk_id_positions']);
    $userName           = htmlspecialchars($dataUser['username']);
    $placeOfBrith       = htmlspecialchars($dataUser['place_of_brith']);
    $dateOfBrith        = date('Y-m-d', strtotime(htmlspecialchars($dataUser['date_of_brith'])));
    $gender             = htmlspecialchars($dataUser['gender']);
    $phoneNumber        = htmlspecialchars($dataUser['phone_number']);
    $email              = htmlspecialchars($dataUser['email']);
    $address            = htmlspecialchars($dataUser['address']);
    $password           = htmlspecialchars($dataUser['password']);
    $confrimPassword    = htmlspecialchars($dataUser['confrim_password']);
    $photo              = photo();
    $createdAt          = date('Y-m-d');
    $updatedAt          = date('Y-m-d');
    $createdBy          = htmlspecialchars($dataUser['created_by']);
    $updatedBy          = htmlspecialchars($dataUser['update_by']);
    $fullName           = htmlspecialchars($dataUser['full_name']);


    if ($password != $confrimPassword) {
        echo "
        <script>
            alert ('Password not same !!!');
        </script>";
        return false;
    }

    $password = hash('sha256', $password);

    mysqli_query($connect, "INSERT INTO m_users (pk_id_users,
                                                fk_id_positions,
                                                username,
                                                full_name,
                                                place_of_brith,
                                                date_of_brith,
                                                gender,
                                                phone_number,
                                                email,
                                                address,
                                                password,
                                                photo,
                                                created_at, 
                                                updated_at,
                                                created_by,
                                                updated_by)
                                        VALUES ('',
                                                '$fk_id_positions',
                                                '$userName',
                                                '$fullName',
                                                '$placeOfBrith',
                                                '$dateOfBrith ',
                                                '$gender',
                                                '$phoneNumber ',
                                                '$email',
                                                '$address',
                                                '$password',
                                                '$photo',
                                                '$createdAt',
                                                '$updatedAt',
                                                '$createdBy',
                                                '$updatedBy')");

    return mysqli_affected_rows($connect);
}

function photo()
{
    $photoName    = $_FILES['photo']['name'];
    $folderName   = $_FILES['photo']['tmp_name'];

    move_uploaded_file($folderName, '../../DATABASE/IMAGE/' . $photoName);
    return $photoName;
}
// ADD USER \\

// SEACRH USER
function searchUser($keyword)
{
    $query = "SELECT * FROM m_positions 
            INNER JOIN m_users ON m_positions.pk_id_positions  =  m_users.fk_id_positions  
            WHERE   position_name    LIKE '%$keyword%' OR 
                    username         LIKE '%$keyword%'";
    return showUsers($query);
}
// SEARCH USER \\

// DELETE USER
function deleteUser($id)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM m_users WHERE pk_id_users = $id");

    return mysqli_affected_rows($connect);
}
// DELETE USER \\
