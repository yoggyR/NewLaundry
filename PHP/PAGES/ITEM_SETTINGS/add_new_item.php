<?php
if (isset($_POST["saveItem"])) {
    if (addItem($_POST) > 0) {
        echo "
            <script>
                alert ('Done');
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
<div class="modal fade" id="addnewitem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewitemLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewitemLabel">New item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="created_by" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                    <div class="row">
                        <div class="col-6">
                            <label for="nameItem" class="form-label fw-bold">Name item</label>
                            <input type="text" name="name_item" class="form-control" id="nameItem" placeholder="Enter new name item" autocomplete="off" required>
                        </div>
                        <div class="col-6">
                            <label for="pricePerItem" class="form-label fw-bold">Price per item</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">IDR</span>
                                <input type="text" name="price_per_item" class="form-control" id="pricePerItem" placeholder="Enter price per item" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="saveItem" class="btn btn_save_new_item"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" style="margin-top: -5px;"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>