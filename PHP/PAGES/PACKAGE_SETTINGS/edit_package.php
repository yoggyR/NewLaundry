<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom"><label for="" style="color: rgb(134, 133, 133);">Package setting</label>
    <label>
        <span style="font-weight: bold; margin-left: -494px;"> / <?php echo ($pages); ?> </span>
    </label>
    <a href="main.php?page=Package settings" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_packages.php');
$id          = $_GET['id'];
$package     = showPackage("SELECT * FROM m_packages WHERE pk_id_packages = $id")[0];
$listItems   = showPackage("SELECT x.pk_id_items, x.name_item, y.pk_id_items as selected FROM m_items x LEFT  JOIN ( SELECT * FROM m_items LEFT JOIN bridge ON bridge.fk_id_items = m_items.pk_id_items WHERE fk_id_packages ='$package[pk_id_packages]' )y ON x.pk_id_items=y.pk_id_items");
if (isset($_POST['save'])) {
    if (editBridge($_POST) > 0) {
        echo "
            <script>
                alert ('Successfully');
                document.location.href = 'main.php?page=Package settings';
            </script>";
    } else {
        echo "
            <script>
                alert ('Failed');
            </script>";
    }
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="countainer">
            <form action="" method="POST">
                <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="created_by" value="<?php echo $package['created_by'] ?>">
                <input type="hidden" name="created_at" value="<?php echo $package['created_at'] ?>">
                <input type="hidden" name="pk_id_packages" value="<?php echo $package['pk_id_packages'] ?>">
                <div class="row justify-content-center pt-2">
                    <div class="col-8">
                        <div class="mb-2">
                            <label class="form-label fw-bold">Name package</label>
                            <input type="text" class="form-control" placeholder="Enter name package" name="name_package" value="<?php echo $package['name_package'] ?>" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Package price</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">IDR</span>
                                        <input type="text" class="form-control" placeholder="Enter package price" name="package_price" value="<?php echo $package['package_price'] ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Processing time</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="Enter the number of days required" name="processing_time" value="<?php echo $package['processing_time'] ?>" autocomplete="off">
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
                                        <input type="text" class="form-control" placeholder="Minimum weight" name="min_weight" value="<?php echo $package['min_weight'] ?>" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold pt-2">Max weight</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="Maximum weight" name="max_weight" value="<?php echo $package['max_weight'] ?>" autocomplete="off">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold pt-2">Select items</label>
                            <div class="row ms-3">
                                <?php foreach ($listItems as $item) : ?>
                                    <div class="col-3 pt-2">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $item['pk_id_items']; ?>" name="pk_id_items[]" id="flexCheckDefault" <?php echo $item['selected'] == null ? '' : 'checked' ?>>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <?php echo $item['name_item']; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-2 mt-4">
                            <div class="row">
                                <div class="col-3 ms-auto">
                                    <button type="submit" class="btn btn_save_edit_package" name="save"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" class="img_save_edit_package">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>