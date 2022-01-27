<?php
// CONNECT
include('../../PHP/CONFIG/connect_database.php');
// CONNECT \\

// SHOW ITEMS
function showItems($operation)
{
    global $connect;

    $result = mysqli_query($connect, $operation);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }

    return $box;
}
// SHOW ITEMS \\

// ADD ITEM
function addItem($item)
{
    global $connect;

    $name_item          = htmlspecialchars($item['name_item']);
    $price_per_item     = htmlspecialchars($item['price_per_item']);
    $createdBy          = htmlspecialchars($item['created_by']);
    $updatedBy          = htmlspecialchars($item['updated_by']);
    $createdAt          = date('Y-m-d');
    $updatedAt          = date('Y-m-d');

    mysqli_query($connect, "INSERT INTO m_items (pk_id_items,
                                                name_item, 
                                                price_per_item, 
                                                created_by, 
                                                updated_by, 
                                                created_at, 
                                                updated_at) 
                                        VALUES  ('',
                                                '$name_item',
                                                '$price_per_item',
                                                '$createdBy',
                                                '$updatedBy',
                                                '$createdAt',
                                                '$updatedAt')");

    return mysqli_affected_rows($connect);
};
// ADD ITEM \\

// EDIT ITEM
function editItem($item)
{
    global $connect;
    $pk_id_items        = $item['pk_id_items'];
    $name_item          = htmlspecialchars($item['name_item']);
    $price_per_item     = htmlspecialchars($item['price_per_item']);
    $updatedBy          = htmlspecialchars($item['updated_by']);
    $updatedAt          = date('Y-m-d');

    mysqli_query($connect, "UPDATE m_items  SET     name_item       = '$name_item', 
                                                    price_per_item  = '$price_per_item',
                                                    updated_by      = '$updatedBy',
                                                    updated_at      = '$updatedAt'
                                            WHERE   pk_id_items     = '$pk_id_items'");

    return mysqli_affected_rows($connect);
}
// EDIT ITEM \\

// DELETE ITEM
function deleteItem($id_item)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM m_items WHERE pk_id_items = $id_item");

    return mysqli_affected_rows($connect);
}
// DELETE ITEM \\

// SEARCH ITEM
function searchItem($keyword)
{
    $query = "SELECT * FROM m_items WHERE   name_item       LIKE '%$keyword%' OR 
                                            price_per_item  LIKE '%$keyword%'";
    return showItems($query);
}
// SEARCH ITEM \\
