<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_transaction.php');
if (isset($_POST["search"])) {
    $showCheckout = searchTransaction($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="container">
            <div class="row receptacle_transaction">
                <div class="col-md-5">
                    <h1 class="txt_title_transaction">Find</h1>
                    <h1 class="txt_title_transaction_different_colour">Data</h1>
                    <h1 class="txt_title_transaction mb-4">Transaction</h1>
                    <form action="" method="POST">
                        <div class="mb-2">
                            <input type="text" class="form-control form_search_transaction_id" maxlength="10" placeholder="Transaction code" autocomplete="off" name="keyword">
                        </div>
                        <p class="txt_notif_transaction_id">Enter just 10 character transaction code</p>
                        <button class="btn btn-lg btn_search_transaction_id" type="submit" name="search"><span class="txt_btn_search_transaction_id">Search now</span></button>
                    </form>
                </div>
                <div class="col-md-5">
                    <img src="../../ASSET/ILLUSTRATION/undraw_No_data_re_kwbl.svg" class="img_transaction_ilustration">
                </div>
            </div>
        </div>
    </div>
</div>