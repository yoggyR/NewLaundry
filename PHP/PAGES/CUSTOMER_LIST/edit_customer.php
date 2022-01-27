<?php
if (isset($_POST['saveEdit'])) {
    if (editCustomer($_POST) > 0) {
        echo "
            <script>
                alert ('Successfully');
                document.location.href = 'main.php?page=Customer list';
            </script>";
    } else {
        echo "
            <script>
                alert ('Failed');
            </script>";
    }
}
?>
<div class="modal fade" id="editcustomer<?php echo $list['pk_id_users'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editcustomerLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="pk_id_users" value="<?php echo $list['pk_id_users'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="editcustomerLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <label for="Name customer" class="form-label fw-bold">Name</label>
                            <input type="text" name="full_name" class="form-control" id="Name customer" placeholder="Name customer" autocomplete="off" value="<?php echo $list['full_name'] ?>">
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Gender" class="form-label fw-bold">Gender</label>
                            <select name="gender" id="Gender" class="form-select">
                                <option value="">Choose...</option>
                                <?php
                                if ($list['gender'] == 'Male') {
                                    echo   "<option value='Male' selected>Male</option> 
                                            <option value='Female'>Female</option>";
                                } else {
                                    echo   "<option value='Male'>Male</option> 
                                            <option value='Female' selected>Female</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Phone number" class="form-label fw-bold">Phone number</label>
                            <input type="text" name="phone_number" class="form-control" id="Phone number" placeholder="Phone number customer" autocomplete="off" value="<?php echo $list['phone_number'] ?>">
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Address" class="form-label fw-bold">Address</label>
                            <textarea name="address" class="form-control" id="Address" placeholder="Address customer" autocomplete="off"><?php echo $list['address'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="saveEdit" class="btn btn_save_edit_customer"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" style="margin-top: -5px;"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>