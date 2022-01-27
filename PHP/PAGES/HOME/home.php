<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_packages.php');
$packagesList = showPackage("SELECT * FROM m_packages ORDER BY name_package ASC");
?>
<div class='row'>
    <div class="md-col-12">
        <div class="container ">
            <div class="row justify-content-evenly">
                <?php foreach ($packagesList as $packages) : ?>
                    <div class="col-3">
                        <a href="main.php?page=Order&id_package=<?php echo $packages['pk_id_packages'] ?>">
                            <button class="btn_package shadow">
                                <p class="txt_head_package">Package</p>
                                <h1 class="txt_name_package "><?php echo $packages['name_package'] ?></h1>
                                <img class="img_package" src="../../ASSET/LOGO/johnny-automatic-Services-5 - Copy.svg" alt="">
                                <p class="txt_powered_by">Powered by Laundry&trade;</p>
                            </button>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>