<?php
if (isset($_POST['save'])) {
    if (editItem($_POST) > 0) {
        echo "
            <script>
                alert ('Successfully');
                document.location.href = 'main.php?page=Item settings';
            </script>";
    } else {
        echo "
            <script>
                alert ('Failed');
            </script>";
    }
}
?>
<div class="modal fade" id="edititem<?php echo $items['pk_id_items']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edititemLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="edititemLabel">Edit item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pk_id_items" value="<?php echo $items['pk_id_items']; ?>">
                    <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                    <div class="row">
                        <div class="col-6">
                            <label for="nameItem" class="form-label fw-bold">Name item</label>
                            <input type="text" class="form-control" id="nameItem" placeholder="Enter new name item" name="name_item" value="<?php echo $items['name_item']; ?>" autocomplete="off">
                        </div>
                        <div class="col-6">
                            <label for="pricePerItem" class="form-label fw-bold">Price per item</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">IDR</span>
                                <input type="text" class="form-control" id="pricePerItem" placeholder="Enter price per item" name="price_per_item" value="<?php echo $items['price_per_item']; ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn_save_edit_item"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" style="margin-top: -3px;"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>