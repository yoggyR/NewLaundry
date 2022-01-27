<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label for="" style="color: rgb(134, 133, 133);">Package settings</label>
    <label>
        <span style="font-weight: bold; margin-left: -490px;"> / <?php echo ($pages); ?></span>
    </label>
    <a href="main.php?page=Package settings" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_packages.php');
if (isset($_POST["save"])) {
    if (createNewPackage($_POST) & bridge($_POST) > 0) {
        echo "
            <script>
                alert ('successfully');
                document.location.href = 'main.php?page=Package settings';  
            </script>";
    } else {
        echo "
        <script>
            alert ('failed to add !!!');
        </script>";
    }
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="countainer">
            <form action="" method="POST">
                <div class="row justify-content-center pt-2">
                    <input type="hidden" name="created_by" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                    <div class="col-8">
                        <div class="mb-2">
                            <label class="form-label fw-bold">Name package</label>
                            <input type="text" class="form-control" placeholder="Enter name package" name="name_package" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Package price</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">IDR</span>
                                        <input type="text" class="form-control" placeholder="Enter package price" name="package_price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Processing time</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="Enter the number of days" name="processing_time" autocomplete="off">
                                        <span class="input-group-text">Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Min weight</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="Minimum weight" name="min_weight" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Max weight</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="Maximum weight" name="max_weight" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold pt-2">Select items</label>
                            <div class="row ms-3">
                                <?php
                                $selectItems = showPackage("SELECT * FROM m_items");
                                ?>
                                <?php foreach ($selectItems as $items) : ?>
                                    <div class="col-3 pt-2">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" name="pk_id_items[]" type="checkbox" value="<?php echo $items['pk_id_items']; ?>" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <?php echo $items['name_item']; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-2 mt-4">
                            <div class="row">
                                <div class="col-3 ms-auto">
                                    <button type="submit" class="btn btn_cnp_save" name="save"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" class="img_cnp_save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>