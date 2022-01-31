<?php
include('../FUNCTIONS/functions_transaction.php');

$id = $_GET['id'];

$showOFTDetails = showTransaction("SELECT * FROM t_header
                                INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                                INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                                WHERE pk_id_header = $id");

?>
<?php foreach ($showOFTDetails as $OFTDetails) : ?>
    <?php
    $pkIdHeader         = $OFTDetails['pk_id_header'];
    $packagePrice       = $OFTDetails['package_price'];
    $weight             = $OFTDetails['weight'];
    $price              = $OFTDetails['price'];
    $remainder          = $OFTDetails['remainder'];
    $already            = $OFTDetails['already'];
    $laundryStatus      = $OFTDetails['laundry_status'];
    $dateLaundryStatus  = $OFTDetails['date_laundry_status'];
    $estimate           = $OFTDetails['date_estimate'];
    ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php if ($laundryStatus == "On process") : ?>
            <label><span style='font-weight: bold;'>Details</span></label>
            <a href="main.php?page=On process" type="button" class="btn-close" title="Close this page"></a>
        <?php endif; ?>
        <?php if ($laundryStatus == "Finished") : ?>
            <label><span style='font-weight: bold;'>Details</span></label>
            <a href="main.php?page=Finished" type="button" class="btn-close" title="Close this page"></a>
        <?php endif; ?>
        <?php if ($laundryStatus == "Taken") : ?>
            <label><span style='font-weight: bold;'>Details</span></label>
            <a href="main.php?page=Taken" type="button" class="btn-close" title="Close this page"></a>
        <?php endif; ?>
    </div>

    <div class='row'>
        <div class="md-col-12">
            <form action="" method="POST">
                <div class="countainer border" style="padding: 20px;">
                    <input type="hidden" name="pkIdHeader" value="<?php echo $OFTDetails['pk_id_header'] ?>">
                    <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="row">
                                <div class="col-6">
                                    <img src="../../ASSET/LOGO/johnny-automatic-Services-5.svg" class="img_label_checkout"> <label class="label_checkout"> <?php echo $OFTDetails['name_package'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class=" col-6">
                            <div class="row">
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Transaction code</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $OFTDetails['transaction_code'] ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Customer name</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $OFTDetails['full_name'] ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Phone number</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $OFTDetails['phone_number'] ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Address</label>
                                </div>
                                <div class="col-8 pb-3">
                                    <label><?php echo $OFTDetails['address'] ?></label>
                                </div>                                
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Order</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo date('d-m-Y', strtotime($OFTDetails['date_order'])) ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Estimate</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo date('d-m-Y', strtotime($OFTDetails['date_estimate'])) ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Finished</label>
                                </div>
                                <div class="col-8">
                                    <?php if ($laundryStatus == "Finished" || $laundryStatus == "Taken") : ?>
                                        <label><?php echo date('d-m-Y', strtotime($OFTDetails['date_finished'])) ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Laundry status</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $OFTDetails['laundry_status'] ?></label>
                                </div>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Note</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $OFTDetails['note'] ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Items</label>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <?php
                                        $listItem = showTransaction("SELECT * FROM bridge
                                        INNER JOIN t_details ON bridge.pk_id_bridge = t_details.fk_id_bridge
                                        INNER JOIN m_items  ON bridge.fk_id_items = m_items.pk_id_items
                                        WHERE fk_id_header = $pkIdHeader");
                                        ?>
                                        <?php foreach ($listItem as $item) : ?>
                                            <?php if ($item['units'] != 0) : ?>
                                                <div class='col-6 pb-3'>
                                                    <label><?php echo $item['name_item'] ?> [ <?php echo $item['units'] ?> ]</label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Weight</label>
                                </div>
                                <div class="col-8">
                                    <?php if (!empty($weight)) {
                                        echo "<label>$weight Kg</label>";
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Price</label>
                                </div>
                                <div class="col-8">
                                    <label for="">IDR <?php echo $formatRemainder = number_format("$price", 0, ",", ".") ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Already</label>
                                </div>
                                <div class="col-8">
                                    <label>IDR <?php echo $formatAlready = number_format("$already", 0, ",", "."); ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Remainder</label>
                                </div>
                                <div class="col-8">
                                    <label>IDR <?php echo $formatRemainder = number_format("$remainder", 0, ",", ".") ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Payment status</label>
                                </div>
                                <div class="col-8">
                                    <?php if ($price == $already) {
                                        echo "
                                            <label>Paid off</label>";
                                    } else {
                                        echo "
                                            <label>Arrears</label>";
                                    }
                                    ?>
                                </div>

                                <div class="col-8 ms-auto pt-3">
                                    <div class="row">
                                        <input type="hidden" name="laundry_status" value="Finished">
                                        <?php if (isset($_POST['finished'])) : ?>
                                            <?php if (laundryStatus($_POST) > 0) : ?>
                                                <?php echo "
                                                        <script>
                                                            document.location.href = 'main.php?page=Finished';
                                                        </script>";
                                                ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($estimate == date('Y-m-d') || $estimate <= date('Y-m-d') && $laundryStatus == "On process") : ?>
                                            <div class="col-8 ms-auto">
                                                <button type="submit" name="finished" class="btn btn_finished_on_process form-control"><img src="../../ASSET/ICON/PACKAGE/flag-fill.svg" class="img_btn_finished_on_process">Finished process</button>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($estimate != date('Y-m-d') && $estimate >= date('Y-m-d') && $laundryStatus == "On process") : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_still_process">STILL PROCESS</h3>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($laundryStatus == "Finished" && $price != $already) : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_not_yet_paid_off">NOT YET PAID OFF</h3>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($laundryStatus == "Finished" && $price == $already) : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_not_taken_yet">NOT TAKEN YET</h3>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($laundryStatus == "Taken") : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_taken_report">TAKEN : <?php echo date('d-m-Y', strtotime($dateLaundryStatus)) ?></h3>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>