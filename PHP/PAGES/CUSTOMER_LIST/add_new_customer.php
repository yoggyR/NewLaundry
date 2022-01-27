<?php
$positions = showCustomers("SELECT * FROM m_positions WHERE position_name = 'Customer'");
if (isset($_POST["saveAdd"])) {
    if (addNewCustomer($_POST) > 0) {
        echo "
            <script>
                alert ('successfully');
                document.location.href = 'main.php?page=Customer list'; 
            </script>";
    } else {
        echo "
        <script>
            alert ('failed to add !!!');
        </script>";
    }
}
?>
<div class="modal fade" id="addnewcustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewcustomerLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewcustomerLabel">New customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <?php foreach ($positions as $name) : ?>
                            <input type="hidden" name="fk_id_positions" value="<?php echo $name['pk_id_positions'] ?>">
                        <?php endforeach; ?>
                        <input type="hidden" name="created_by" value="<?php echo $_SESSION['username'] ?>">
                        <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                        <div class="col-12 pb-2">
                            <label for="Name customer" class="form-label fw-bold">Name</label>
                            <input type="text" name="full_name" class="form-control" id="Name customer" placeholder="Name customer" autocomplete="off" required>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Gender" class="form-label fw-bold">Gender</label>
                            <select name="gender" id="Gender" class="form-select">
                                <option value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Phone number" class="form-label fw-bold">Phone number</label>
                            <input type="text" name="phone_number" class="form-control" id="Phone number" placeholder="Phone number customer" autocomplete="off" required>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="Address" class="form-label fw-bold">Address</label>
                            <textarea name="address" class="form-control" id="Address" placeholder="Address customer" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="saveAdd" class="btn btn_save_add_new_customer"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" style="margin-top: -5px;"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>