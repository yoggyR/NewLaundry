<?php
// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW TRANSACTION
function showTransaction($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW TRANSACTION \\

// ADD TRANSACTION
function addTransaction($addTransaction)
{
    global $connect;

    mysqli_begin_transaction($connect);

    try {
        $fkIdPackages       = $addTransaction['pk_id_packages'];
        $fkIdUsers          = $addTransaction['pk_id_users'];
        $transactionCode    = htmlspecialchars($addTransaction['transaction_code']);
        $dateOrder          = date('Y-m-d');
        $estimate           = date('Y-m-d', strtotime(htmlspecialchars($addTransaction['estimate'])));
        $weight             = htmlspecialchars($addTransaction['weight']);
        $note               = htmlspecialchars($addTransaction['note']);
        $price              = htmlspecialchars($addTransaction['price']);
        $already            = htmlspecialchars($addTransaction['already']);
        $remainder          = htmlspecialchars($addTransaction['remainder']);
        $pay                = htmlspecialchars($addTransaction['pay']);
        $laundryStatus      = htmlspecialchars($addTransaction['laundry_status']);
        $dateLaundryStatus  = date('Y-m-d');
        $dateFinished       = date('Y-m-d');
        $createdAt          = date('Y-m-d');
        $createdBy          = htmlspecialchars($addTransaction['created_by']);
        $updatedAt          = date('Y-m-d');
        $updatedBy          = htmlspecialchars($addTransaction['updated_by']);

        mysqli_query($connect, "INSERT INTO t_header    (pk_id_header,
                                                        fk_id_packages,
                                                        fk_id_users,
                                                        transaction_code,
                                                        date_order,
                                                        date_estimate,
                                                        date_finished,
                                                        weight,
                                                        note,
                                                        price,
                                                        already,
                                                        remainder,
                                                        pay_now,
                                                        laundry_status,
                                                        date_laundry_status,
                                                        created_at_header,
                                                        created_by_header,
                                                        updated_at_header,
                                                        updated_by_header)

                                            VALUES      ('',
                                                        '$fkIdPackages',
                                                        '$fkIdUsers',
                                                        '$transactionCode',
                                                        '$dateOrder',
                                                        '$estimate',
                                                        '$dateFinished',
                                                        '$weight',
                                                        '$note',
                                                        '$price',
                                                        '$already',
                                                        '$remainder',
                                                        '$pay',
                                                        '$laundryStatus',
                                                        '$dateLaundryStatus',
                                                        '$createdAt',
                                                        '$createdBy',
                                                        '$updatedAt',
                                                        '$updatedBy')");

        $fkIdHeader = mysqli_insert_id($connect);
        $fkIdBridge = $addTransaction['pk_id_bridge'];
        $unit       = $addTransaction['unit'];

        for ($i = 0; $i < count($addTransaction['pk_id_bridge']); $i++) {
            mysqli_query($connect, "INSERT INTO t_details   (pk_id_details,
                                                                fk_id_header,
                                                                fk_id_bridge,
                                                                units)
                                                    VALUES      ('',
                                                                '$fkIdHeader',
                                                                '$fkIdBridge[$i]',
                                                                '$unit[$i]')");
        }
        return mysqli_commit($connect);
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($connect);
        throw $exception;
    }
}

// ADD TRANSACTION \\

// DELETE
function deleteTransaction($id)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM t_header WHERE pk_id_header = $id");

    return mysqli_affected_rows($connect);
}
// DELETE \\

// SEARCH
function searchTransaction($keyword)
{
    $query = "SELECT * FROM t_header 
            INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
            INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
            WHERE transaction_code  LIKE '$keyword'";
    return showTransaction($query);
}
// SEARCH \\

// INSERT MONEY
function insertMoney($money)
{
    global $connect;

    $pkIdHeader     = $money['pkIdHeader'];
    $price          = htmlspecialchars($money['price']);
    $pay            = htmlspecialchars($money['payNow']);
    $al             = htmlspecialchars($money['already']);
    $rm             = htmlspecialchars($money['remainder']);
    $already        = $al + $pay;
    $remainder      = $price - $already;
    $updatedAt      = date('Y-m-d');
    $updatedBy      = htmlspecialchars($money['updated_by']);


    if ($rm == 0) {
        if ($pay > $price) {
            echo "
            <script>
                alert ('Failed');
                document.location.href = 'main.php?page=Checkout';
            </script>";
            exit;
        }
    } elseif ($pay > $rm) {
        echo "
        <script>
            alert ('Failed');
            document.location.href = 'main.php?page=Details';
        </script>";
        exit;
    }

    mysqli_query($connect, "UPDATE t_header SET     price               = '$price',
                                                    already             = '$already',
                                                    remainder           = '$remainder',
                                                    pay_now             = '$pay',
                                                    updated_by_header   = '$updatedBy',
                                                    updated_at_header   = '$updatedAt'
                                            WHERE   pk_id_header        = '$pkIdHeader'");

    return mysqli_affected_rows($connect);
}
// INSERT MONEY \\

// FINISHED
function laundryStatus($finished)
{
    global $connect;

    $pkIdHeader         = $finished['pkIdHeader'];
    $laundryStatus      = htmlspecialchars($finished['laundry_status']);
    $dateLaundryStatus  = date('Y-m-d');
    $dateFinished       = date('Y-m-d');
    $updatedAt          = date('Y-m-d');
    $updatedBy          = htmlspecialchars($finished['updated_by']);

    mysqli_query($connect, "UPDATE t_header SET     date_laundry_status = '$dateLaundryStatus',
                                                    laundry_status      = '$laundryStatus',
                                                    date_finished       = '$dateFinished',
                                                    updated_by_header   = '$updatedBy',
                                                    updated_at_header   = '$updatedAt'
                                            WHERE   pk_id_header        = '$pkIdHeader'");

    return mysqli_affected_rows($connect);
}
// FINISHED \\

// GIVE
function give($give)
{
    global $connect;
    $pkIdHeader         = $give['pkIdHeader'];
    $laundryStatus      = htmlspecialchars($give['laundry_status']);
    $dateLaundryStatus  = date('Y-m-d');
    $updatedAt          = date('Y-m-d');
    $updatedBy          = htmlspecialchars($give['updated_by']);

    mysqli_query($connect, "UPDATE t_header SET     date_laundry_status = '$dateLaundryStatus',
                                                    laundry_status      = '$laundryStatus',
                                                    updated_by_header   = '$updatedBy',
                                                    updated_at_header   = '$updatedAt'
                                            WHERE   pk_id_header        = '$pkIdHeader'");

    return mysqli_affected_rows($connect);
}
// GIVE \\