<?php
include('../FUNCTIONS/functions_transaction.php');
$id = $_GET['id'];
$editOrder = showTransaction("SELECT * FROM t_header 
                            INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                            INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                            WHERE pk_id_header = $id")[0];
$customers = showTransaction("SELECT * FROM m_positions 
                            INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions 
                            WHERE status = 'Client'");
$listItem = showTransaction("SELECT * FROM bridge
                            INNER JOIN t_details ON bridge.pk_id_bridge = t_details.fk_id_bridge
                            INNER JOIN m_items  ON bridge.fk_id_items = m_items.pk_id_items
                            WHERE fk_id_header = $id");
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <label for="" style="color: rgb(134, 133, 133);">Home</label>
    <label><span style="font-weight: bold; margin-left: -528px;"> / Order </span></label>
    <a href="main.php?page=Delete order&id=<?php echo $id ?>" type="button" class="btn-close" title="Close this page"></a>
</div>

<div class="row">
    <div class="md-col-12">
        <form action="" method="POST">
            <div class="countainer">
                <div class="row justify-content-center">
                    <div class="col-8 pb-3" style="margin-top: -5px;">
                        <div class="mb-3">
                            <img src="../../ASSET/LOGO/johnny-automatic-Services-5.svg" class="img_label_edit_order"> <label class="label_edit_order"><?php echo $editOrder['name_package'] ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="Transaction ID" class="fw-bold">Transaction code</label>
                            <input type="text" name="" class="form-control text-center" id="Transaction ID" value="<?php echo $editOrder['transaction_code'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="fw-bold">Name</label>
                            <select id="name" class="js-example-placeholder-single js-states form-control" name="name_customer">
                                <?php foreach ($customers as $customerList) : ?>
                                    <option value=""></option>
                                    <option value="<?php echo $customerList['full_name'] ?>"><?php echo $customerList['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="Order date" class="fw-bold">Order</label>
                                    <input type="text" name="" class="form-control text-center" id="Order date" value="<?php echo date('d-m-Y', strtotime($editOrder['date_order'])); ?>" disabled>

                                </div>
                                <div class="col-6">
                                    <label for="finishdate" class="fw-bold">Estimate finished</label>
                                    <input type="text" name="" class="form-control text-center icon_calendar_edit_order_estimate" id="finishdate" value="<?php echo date('d-m-Y', strtotime($editOrder['estimate_finished'])); ?>">

                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="Min weight" class="fw-bold">Min weight</label>
                                    <input type="text" class="form-control text-center" id="Min weight" value="<?php echo $editOrder['min_weight'] ?> Kg" disabled>
                                </div>
                                <div class="col-3">
                                    <label for="Max weight" class="fw-bold">Max weight</label>
                                    <input type="text" class="form-control text-center" id="Max weight" value="<?php echo $editOrder['max_weight'] ?> Kg" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="Weight" class="fw-bold">Weight</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" name="" class="form-control text-center" id="Weight" placeholder="Laundry weight" value="<?php echo $editOrder['weight'] ?>" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Items</label>
                            <div class="row ms-2">
                                <?php foreach ($listItem as $list) : ?>
                                    <div class="col-6 pt-1">
                                        <div class="row">
                                            <div class="col-7">
                                                <p style="margin-top: 6px;"><?php echo $list['name_item'] ?></p>
                                            </div>
                                            <?php
                                            $item = $list['units'];
                                            if ($item == 0) {
                                                echo '
                                            <div class="col-4">
                                                <input type="text" name="" value="" class="form-control text-center" autocomplete="off" maxlength="3" placeholder="-" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                                            </div>';
                                            } else {
                                                echo "
                                            <div class='col-4'>
                                                <input type='text' name='' value='$item' class='form-control text-center' autocomplete='off' maxlength='3' placeholder='-' onkeypress='return event.charCode>= 48 && event.charCode <=57'>
                                            </div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Note" class="fw-bold">Note</label>
                            <textarea name="" class="form-control" id="Note" placeholder="Note from customer" autocomplete="off" style="height: 100px;"><?php echo $editOrder['note'] ?></textarea>
                        </div>
                        <div class="mb-1">
                            <div class="row">
                                <div class="col-3 pt-3 ms-auto">
                                    <a type="button" href="main.php?page=Checkout" name="process" class="btn btn_edit_order_checkout form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-up-arrow-circle.svg" class="img_edit_order_checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>