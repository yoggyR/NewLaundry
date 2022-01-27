<?php
// ----------------------------------------------------------------- \\

// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW PACKAGES
function showPackage($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW PACKAGES \\

// ADD PACKAGE
function createNewPackage($package)
{
    global $connect;

    $namePackage        = htmlspecialchars($package['name_package']);
    $packagePrice       = htmlspecialchars($package['package_price']);
    $processingTime     = htmlspecialchars($package['processing_time']);
    $minWeight          = htmlspecialchars($package['min_weight']);
    $maxWeight          = htmlspecialchars($package['max_weight']);
    $createdBy          = htmlspecialchars($package['created_by']);
    $updatedBy          = htmlspecialchars($package['updated_by']);
    $createdAt          = date('Y-m-d');
    $updatedAt          = date('Y-m-d');

    mysqli_query($connect, "INSERT INTO m_packages  (pk_id_packages,
                                                    name_package, 
                                                    package_price, 
                                                    processing_time, 
                                                    min_weight, 
                                                    max_weight, 
                                                    created_by,
                                                    updated_by,
                                                    created_at, 
                                                    updated_at) 
                                        VALUES      ('',
                                                    '$namePackage',
                                                    '$packagePrice',
                                                    '$processingTime',
                                                    '$minWeight',
                                                    '$maxWeight',
                                                    '$createdBy',
                                                    '$updatedBy',
                                                    '$createdAt',
                                                    '$updatedAt')");

    return mysqli_affected_rows($connect);
}
// ADD PACKAGE \\

// EDIT PACKAGE
function editPackage($editPackage)
{
    global $connect;

    $pkIdPackages       = $editPackage['pk_id_packages'];
    $namePackage        = htmlspecialchars($editPackage['name_package']);
    $packagePrice       = htmlspecialchars($editPackage['package_price']);
    $processingTime     = htmlspecialchars($editPackage['processing_time']);
    $minWeight          = htmlspecialchars($editPackage['min_weight']);
    $maxWeight          = htmlspecialchars($editPackage['max_weight']);
    $updatedBy          = htmlspecialchars($editPackage['updated_by']);
    $updatedAt          = date('Y-m-d');

    mysqli_query($connect, "UPDATE m_packages SET   name_package    = '$namePackage',
                                                    package_price   = '$packagePrice',
                                                    processing_time = '$processingTime',
                                                    min_weight      = '$minWeight',
                                                    max_weight      = '$maxWeight',
                                                    updated_by      = '$updatedBy',
                                                    updated_at      = '$updatedAt'
                                            WHERE   pk_id_packages  = '$pkIdPackages'");

    return mysqli_affected_rows($connect);
}
// EDIT PACKAGE \\

// DELETE PACKAGE
function deletePackage($id_package)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM m_packages WHERE pk_id_packages = $id_package");

    return mysqli_affected_rows($connect);
}
// DELETE PACKAGE \\

// SEARCH PACKAGE
function searchPackage($keyword)
{
    $query = "SELECT * FROM m_packages WHERE name_package LIKE '%$keyword%'";

    return showPackage($query);
}
// SEARCH PACKAGE \\

// ----------------------------------------------------------------- \\

// BRIDGE
// ADD
function bridge($bridge)
{
    global $connect;

    $last_id            = mysqli_insert_id($connect);
    $pkIdItems          = $bridge['pk_id_items'];

    foreach ($pkIdItems as $items) {
        mysqli_query($connect, "INSERT INTO bridge (pk_id_bridge,
                                                    fk_id_packages,
                                                    fk_id_items)
                                            VALUES ('',
                                                    '$last_id',
                                                    '$items')");
    }
    return mysqli_affected_rows($connect);
}
// ADD \\

// EDIT
function editBridge($editBridge)
{
    global $connect;

    $pkIdPackages       = $editBridge['pk_id_packages'];

    mysqli_query($connect, "DELETE FROM m_packages WHERE pk_id_packages = $pkIdPackages");


    $namePackage        = htmlspecialchars($editBridge['name_package']);
    $packagePrice       = htmlspecialchars($editBridge['package_price']);
    $processingTime     = htmlspecialchars($editBridge['processing_time']);
    $minWeight          = htmlspecialchars($editBridge['min_weight']);
    $maxWeight          = htmlspecialchars($editBridge['max_weight']);
    $createdBy          = htmlspecialchars($editBridge['created_by']);
    $updatedBy          = htmlspecialchars($editBridge['updated_by']);
    $createdAt          = htmlspecialchars($editBridge['created_at']);
    $updatedAt          = date('Y-m-d');

    mysqli_query($connect, "INSERT INTO m_packages  (pk_id_packages,
                                                        name_package, 
                                                        package_price, 
                                                        processing_time, 
                                                        min_weight, 
                                                        max_weight, 
                                                        created_by,
                                                        updated_by,
                                                        created_at, 
                                                        updated_at) 
                                            VALUES      ('',
                                                        '$namePackage',
                                                        '$packagePrice',
                                                        '$processingTime',
                                                        '$minWeight',
                                                        '$maxWeight',
                                                        '$createdBy',
                                                        '$updatedBy',
                                                        '$createdAt',
                                                        '$updatedAt')");

    $last_id            = mysqli_insert_id($connect);
    $pkIdItems          = $editBridge['pk_id_items'];

    foreach ($pkIdItems as $items) {
        mysqli_query($connect, "INSERT INTO bridge (pk_id_bridge,
                                                        fk_id_packages,
                                                        fk_id_items)
                                                VALUES ('',
                                                        '$last_id',
                                                        '$items')");
    }

    return mysqli_affected_rows($connect);
}
// EDIT \\
// BRIDGE \\

// ----------------------------------------------------------------- \\