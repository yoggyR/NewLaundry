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
        $processStatus      = htmlspecialchars($addTransaction['process_status']);
        $taken              = date('Y-m-d');
        $takenStatus        = htmlspecialchars($addTransaction['taken_status']);
        $createdAt          = date('Y-m-d');
        $createdBy          = htmlspecialchars($addTransaction['created_by']);
        $updatedAt          = date('Y-m-d');
        $updatedBy          = htmlspecialchars($addTransaction['updated_by']);

        mysqli_query($connect, "INSERT INTO t_header    (pk_id_header,
                                                        fk_id_packages,
                                                        fk_id_users,
                                                        transaction_code,
                                                        date_order,
                                                        estimate_finished,
                                                        weight,
                                                        note,
                                                        price,
                                                        already,
                                                        remainder,
                                                        pay_now,
                                                        process_status,
                                                        date_taken,
                                                        taken_status,
                                                        created_at,
                                                        created_by,
                                                        updated_at,
                                                        updated_by)

                                            VALUES      ('',
                                                        '$fkIdPackages',
                                                        '$fkIdUsers',
                                                        '$transactionCode',
                                                        '$dateOrder',
                                                        '$estimate',
                                                        '$weight',
                                                        '$note',
                                                        '$price',
                                                        '$already',
                                                        '$remainder',
                                                        '$pay',
                                                        '$processStatus',
                                                        '$taken',
                                                        '$takenStatus',
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
    $query = "SELECT * FROM t_header WHERE transaction_code  LIKE '$keyword'";
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
            document.location.href = 'main.php?page=Checkout';
        </script>";
        exit;
    }

    mysqli_query($connect, "UPDATE t_header SET     price           = '$price',
                                                    already         = '$already',
                                                    remainder       = '$remainder',
                                                    pay_now         = '$pay'
                                            WHERE   pk_id_header    = '$pkIdHeader'");

    return mysqli_affected_rows($connect);
}
// INSERT MONEY \\

// GIVE
function give($give)
{
    global $connect;
    $pkIdHeader         = $give['pkIdHeader'];
    $taken              = date('Y-m-d');
    $takenStatus        = htmlspecialchars($give['taken_status']);

    mysqli_query($connect, "UPDATE t_header SET     date_taken      = '$taken',
                                                    taken_status    = '$takenStatus'
                                            WHERE   pk_id_header    = '$pkIdHeader'");
                                            
    return mysqli_affected_rows($connect);
}
// GIVE \\