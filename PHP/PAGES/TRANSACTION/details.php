<?php
include('../FUNCTIONS/functions_transaction.php');

$showCheckout = showTransaction("SELECT * FROM t_header
                                INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                                INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                                ORDER BY pk_id_header DESC LIMIT 1");

$listDetails = showTransaction("SELECT * FROM t_details");
foreach ($listDetails as $list) {
    $detail = $list['fk_id_header'];
}

$listItem = showTransaction("SELECT * FROM bridge
                                INNER JOIN t_details ON bridge.pk_id_bridge = t_details.fk_id_bridge
                                INNER JOIN m_items  ON bridge.fk_id_items = m_items.pk_id_items
                                WHERE fk_id_header = '$detail'");

if (isset($_POST['pay'])) {
    if (insertMoney($_POST) > 0) {
        echo "
                <script>
                    alert ('Successfully');
                    document.location.href = 'main.php?page=Details';
                </script>";
    } else {
        echo "
                <script>
                    alert ('Failed');
                </script>";
    }
}
?>

<?php foreach ($showCheckout as $checkout) : ?>
    <?php
    $payNow         = $checkout['pay_now'];
    $packagePrice   = $checkout['package_price'];
    $weight         = $checkout['weight'];
    $price          = $checkout['price'];
    $remainder      = $checkout['remainder'];
    $already        = $checkout['already'];
    $processStatus  = $checkout['process_status'];
    $dateTaken      = $checkout['date_taken'];
    $takenStatus    = $checkout['taken_status'];
    ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <label><span style='font-weight: bold;'><?php echo ($pages); ?></span></label>
    </div>

    <div class='row'>
        <div class="md-col-12">
            <form action="" method="POST">
                <div class="countainer border" style="padding: 20px;">
                    <input type="hidden" name="pkIdHeader" value="<?php echo $checkout['pk_id_header'] ?>">
                    <input type="hidden" name="already" value="<?php echo $already ?>">
                    <input type="hidden" name="remainder" value="<?php echo $remainder ?>">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="row">
                                <div class="col-6">
                                    <img src="../../ASSET/LOGO/johnny-automatic-Services-5.svg" class="img_label_checkout"> <label class="label_checkout"> <?php echo $checkout['name_package'] ?></label>
                                </div>
                                <?php if (empty($payNow)) : ?>
                                    <div class="col-2 ms-auto">
                                        <a type="button" href="main.php?page=Edit order&id=<?php echo $checkout['pk_id_header'] ?>" name="edit" class="btn btn_checkout_edit form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_btn_checkout_pay_edit">Edit</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class=" col-6">
                            <div class="row">
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Transaction code</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $checkout['transaction_code'] ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Customer name</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $checkout['full_name'] ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Phone number</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $checkout['phone_number'] ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Address</label>
                                </div>
                                <div class="col-8 pb-3">
                                    <label><?php echo $checkout['address'] ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Order</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo date('d-m-Y', strtotime($checkout['date_order'])) ?></label>
                                </div>

                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Estimate finished</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo date('d-m-Y', strtotime($checkout['estimate_finished'])) ?></label>
                                </div>
                                <?php if (!empty($payNow)) : ?>
                                    <div class="col-4 pb-3">
                                        <label class="fw-bold">Process status</label>
                                    </div>
                                    <div class="col-8">
                                        <label><?php echo $checkout['process_status'] ?></label>
                                    </div>
                                <?php endif; ?>
                                <div class="col-4 pb-3">
                                    <label class="fw-bold">Note</label>
                                </div>
                                <div class="col-8">
                                    <label><?php echo $checkout['note'] ?></label>
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
                                        <?php foreach ($listItem as $item) : ?>
                                            <?php if ($item['units'] != 0) : ?>
                                                <div class='col-6 pb-3'>
                                                    <label><?php echo $item['name_item'] ?> [ <?php echo $item['units'] ?> ]</label>
                                                </div>
                                                <?php
                                                $pricePerItem       = $item['price_per_item'];
                                                $units              = $item['units'];
                                                $priceItemUnit1[]   = $pricePerItem * $units;
                                                $priceItemUnit2     = array_sum($priceItemUnit1);
                                                ?>
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
                                    <?php
                                    if (empty($weight)) {
                                        $total1 = $packagePrice + $priceItemUnit2;
                                        $formatPrice = number_format("$total1", 0, ",", ".");
                                        echo "<input type='hidden' name='price' value='$total1'>";
                                    } elseif (empty($units)) {
                                        $total2 = $packagePrice * $weight;
                                        $formatPrice = number_format("$total2", 0, ",", ".");
                                        echo "<input type='hidden' name='price' value='$total2'>";
                                    } else {
                                        $totalBegin1     = $priceItemUnit2 + $packagePrice;
                                        $totalBegin2     = $packagePrice * $weight;
                                        $total3          = $totalBegin1 + $totalBegin2;
                                        $formatPrice = number_format("$total3", 0, ",", ".");
                                        echo "<input type='hidden' name='price' value='$total3'>";
                                    }
                                    ?>
                                    <label for="">IDR <?php echo $formatPrice ?></label>
                                </div>

                                <?php
                                if (!empty($payNow)) : ?>
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
                                <?php endif; ?>

                                <?php if ($price != $already) : ?>
                                    <div class="col-4 pb-3">
                                        <label class="fw-bold">Pay Now</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="payNow" placeholder="Enter here" class="form-control" autocomplete="off" required>
                                    </div>
                                <?php endif; ?>

                                <div class="col-8 ms-auto pt-3">
                                    <div class="row">
                                        <?php if ($price != $already) : ?>
                                            <div class="col-6 ms-auto">
                                                <button type="submit" name="pay" class="btn btn_checkout_pay form-control"><img src="../../ASSET/ICON/PACKAGE/wallet-fill.svg" class="img_btn_checkout_pay_edit">Pay</button>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($price == $already && $processStatus == "On process") : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_still_process">STILL PROCESS</h3>
                                            </div>
                                        <?php endif; ?>

                                        <input type="hidden" name="taken_status" value="Yes">
                                        <?php if (isset($_POST['give'])) : ?>
                                            <?php if (give($_POST) > 0) : ?>
                                                <?php echo "
                                                        <script>
                                                            document.location.href = 'main.php?page=Details';
                                                        </script>";
                                                ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if ($price == $already && $processStatus != "On process" && $takenStatus == "No") : ?>
                                            <div class="col-6 ms-auto pt-3">
                                                <button type="submit" name="give" class="btn btn_transaction_details_pay_and_give form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-shopping-bag.svg" class="img_transaction_details_pay_and_give">Give</button>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($takenStatus == "Yes") : ?>
                                            <div class="col pt-3">
                                                <h3 class="fw-bold text-light text-center notice_taken_report">TAKEN : <?php echo date('d-m-Y', strtotime($dateTaken)) ?></h3>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (empty($payNow)) : ?>
                                            <div class="col-6">
                                                <a type="button" href="main.php?page=Delete order&id=<?php echo $checkout['pk_id_header'] ?>" name="cancel" class="btn btn_checkout_cancel form-control"><img src="../../ASSET/ICON/PACKAGE/close-circle-fill.svg" class="img_btn_checkout_cancel">Cancel</a>
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