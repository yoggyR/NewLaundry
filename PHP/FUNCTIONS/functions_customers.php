<?php
// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW CUSTOMERS
function showCustomers($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW CUSTOMERS \\

// ADD CUSTOMER
function addNewCustomer($newCustomer)
{
    global $connect;

    $fkIdPositions  = $newCustomer['fk_id_positions'];
    $nameCustomer   = htmlspecialchars($newCustomer['full_name']);
    $gender         = htmlspecialchars($newCustomer['gender']);
    $phoneNumber    = htmlspecialchars($newCustomer['phone_number']);
    $address        = htmlspecialchars($newCustomer['address']);
    $createdAt      = date('Y-m-d');
    $createdBy      = htmlspecialchars($newCustomer['created_by']);
    $updatedAt      = date('Y-m-d');
    $updatedBy      = htmlspecialchars($newCustomer['updated_by']);

    mysqli_query($connect, "INSERT INTO m_users (pk_id_users, 
                                                fk_id_positions,
                                                full_name,
                                                gender,
                                                phone_number,
                                                address,
                                                created_at,
                                                created_by,
                                                updated_at,
                                                updated_by)
                                        VALUES  ('',
                                                '$fkIdPositions',
                                                '$nameCustomer',
                                                '$gender',
                                                '$phoneNumber',
                                                '$address',
                                                '$createdAt',
                                                '$createdBy',
                                                '$updatedAt',
                                                '$updatedBy')");

    return mysqli_affected_rows($connect);
}
// ADD CUSTOMER \\

// EDIT CUSTOMER
function editCustomer($editCustomer)
{
    global $connect;

    $pkIdUsers      = $editCustomer['pk_id_users'];
    $nameCustomer   = htmlspecialchars($editCustomer['full_name']);
    $gender         = htmlspecialchars($editCustomer['gender']);
    $phoneNumber    = htmlspecialchars($editCustomer['phone_number']);
    $address        = htmlspecialchars($editCustomer['address']);
    $updatedAt      = date('Y-m-d');
    $updatedBy      = htmlspecialchars($editCustomer['updated_by']);

    mysqli_query($connect, "UPDATE m_users  SET     full_name       = '$nameCustomer',
                                                    gender          = '$gender',
                                                    phone_number    = '$phoneNumber',
                                                    address         = '$address',
                                                    updated_at      = '$updatedAt',
                                                    updated_by      = '$updatedBy'
                                            WHERE   pk_id_users     = '$pkIdUsers'");

    return mysqli_affected_rows($connect);
}
// EDIT CUSTOMER \\

// SEARCH CUSTOMER
function searchCustomer($keyword)
{
    $query = "SELECT * FROM m_users WHERE   full_name       LIKE '%$keyword%' OR 
                                            phone_number    LIKE '%$keyword%'";
    return showCustomers($query);
}
// SEARCH CUSTOMER \\

// DELETE CUTOMER
function deleteCustomer($id_customer)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM m_users WHERE pk_id_users = $id_customer");

    return mysqli_affected_rows($connect);
}
// DELETE CUSTOMER \\
