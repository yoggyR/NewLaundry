<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <label style="color: rgb(134, 133, 133);">Home</label>
    <label>
        <span style="font-weight: bold; margin-left: -528px;"> / <?php echo ($pages); ?></span>
    </label>
    <a href="main.php?page=Home" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_packages.php');
include('../FUNCTIONS/functions_transaction.php');
$transaction_id = mt_rand(100000, 999999);
$id = $_GET['id_package'];
$package = showPackage("SELECT * FROM m_packages WHERE pk_id_packages = $id")[0];
$listItems   = showPackage("SELECT * FROM bridge INNER JOIN m_items 
                            ON bridge.fk_id_items = m_items.pk_id_items 
                            WHERE fk_id_packages = '$package[pk_id_packages]'");
$customers = showPackage("SELECT * FROM m_positions 
INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions WHERE status = 'Client'");

if (isset($_POST["checkout"])) {
    if (addTransaction($_POST) > 0) {
        echo "
            <script>
                alert ('successfully');
                document.location.href = 'main.php?page=Checkout';  
            </script>";
    } else {
        echo "
        <script>
            alert ('failed to add !!!');
        </script>";
    }
}
?>
<div class="row">
    <div class="md-col-12">
        <form action="" method="POST">
            <input type="hidden" name="pk_id_packages" value="<?php echo $package['pk_id_packages']; ?>">
            <input type="hidden" name="package_price" value="<?php echo $package['package_price']; ?>">
            <input type="hidden" name="created_by" value="<?php echo $_SESSION['username'] ?>">
            <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
            <input type="hidden" name="process_status" value="On process">
            <input type="hidden" name="price">
            <input type="hidden" name="already">
            <input type="hidden" name="remainder">
            <input type="hidden" name="pay">
            <input type="hidden" name="taken_status" value="No">
            <div class="countainer">
                <div class="row justify-content-center">
                    <div class="col-8 pb-3" style="margin-top: -5px;">
                        <div class="mb-3">
                            <img src="../../ASSET/LOGO/johnny-automatic-Services-5.svg" class="img_label_order"> <label class="label_order"> <?php echo $package['name_package']; ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="Transaction ID" class="fw-bold">Transaction code</label>
                            <input type="text" name="transaction_code" class="form-control text-center" id="Transaction ID" value="LNY-<?php echo $transaction_id; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="fw-bold">Name</label>
                            <select id="name" class="js-example-placeholder-single js-states form-control" name="pk_id_users" required>
                                <option value=""></option>
                                <?php foreach ($customers as $list) : ?>
                                    <option value="<?php echo $list['pk_id_users'] ?>"><?php echo $list['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="Order date" class="fw-bold">Order</label>
                                    <input type="text" name="date_order" class="form-control text-center" id="Order date" value="<?php echo date('d-m-Y'); ?>" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="finishdate" class="fw-bold">Estimate finished</label>
                                    <input type="text" name="estimate" class="form-control text-center icon_calendar_estimate" id="finishdate" value="<?php echo date('d-m-Y', strtotime('+ ' . $package['processing_time'] . 'days')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="Min weight" class="fw-bold">Min weight</label>
                                    <input type="text" class="form-control text-center" id="Min weight" value="<?php echo $package['min_weight']; ?> Kg" disabled>
                                </div>
                                <div class="col-3">
                                    <label for="Max weight" class="fw-bold">Max weight</label>
                                    <input type="text" class="form-control text-center" id="Max weight" value="<?php echo $package['max_weight']; ?> Kg" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="Weight" class="fw-bold">Weight</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" name="weight" class="form-control text-center" id="Weight" placeholder="Laundry weight" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Items</label>
                            <div class="row ms-2">
                                <?php foreach ($listItems as $item) : ?>
                                    <div class="col-6 pt-1">
                                        <div class="row">
                                            <div class="col-7">
                                                <p style="margin-top: 6px;"><?php echo $item['name_item']; ?></p>
                                            </div>
                                            <div class="col-4">
                                                <input type="hidden" name="pk_id_bridge[]" value="<?php echo $item['pk_id_bridge']; ?>">
                                                <input type="text" name="unit[]" class="form-control text-center" autocomplete="off" maxlength="3" placeholder="-" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Note" class="fw-bold">Note</label>
                            <textarea name="note" class="form-control" id="Note" placeholder="Note from customer" autocomplete="off" style="height: 100px;"></textarea>
                        </div>
                        <div class="mb-1">
                            <div class="row">
                                <div class="col-3 pt-3 ms-auto">
                                    <button type="submit" name="checkout" class="btn btn_order_checkout form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-up-arrow-circle.svg" class="img_order_checkout">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>