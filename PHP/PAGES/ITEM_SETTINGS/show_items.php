<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_items.php');
$itemsList = showItems("SELECT * FROM m_items ORDER BY pk_id_items DESC");
if (isset($_POST["search"])) {
    $itemsList = searchItem($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pb-3 pt-2">
            <div class="col-8 pb-2">
                <a data-bs-toggle="modal" data-bs-target="#addnewitem" type="button" class="btn btn_add_new_item"><img src="../../ASSET/ICON/PACKAGE/bx-plus.svg" class="img_add_new_item">
                    Add new item
                </a>
                <?php include('add_new_item.php'); ?>
            </div>
            <div class="col-4">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_item" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword" autocomplete="off">
                    <button class="btn btn_search_item" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table_item_settings table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name items</th>
                            <th>Price per item</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($itemsList as $items) : ?>
                            <tr>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo $no; ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo $items['name_item']; ?></p>
                                </td>
                                <td>
                                    <?php
                                    $pricePerItem = $items['price_per_item'];
                                    ?>
                                    <p class="txt_content_item_settings">IDR <?php echo $format = number_format("$pricePerItem", 0, ",", "."); ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo date('d-m-Y', strtotime($items['created_at'])); ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo $items['created_by']; ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo date('d-m-Y', strtotime($items['updated_at'])); ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_item_settings"><?php echo $items['updated_by']; ?></p>
                                </td>
                                <td>
                                    <a class="btn btn_edit_item" data-bs-toggle="modal" data-bs-target="#edititem<?php echo $items['pk_id_items']; ?>" type="button" title="Edit"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_edit_item"></a>
                                    <a class="btn btn_delete_item" type="button" title="Delete" href="main.php?page=Delete item&id_item=<?php echo $items['pk_id_items']; ?>"><img src="../../ASSET/ICON/PACKAGE/bxs-trash.svg" class="img_delete_item"></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php include('edit_item.php'); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>