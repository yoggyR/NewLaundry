<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_packages.php');
$packagesList = showPackage("SELECT * FROM m_packages ORDER BY pk_id_packages DESC ");
if (isset($_POST["search"])) {
    $packagesList = searchPackage($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2">
            <div class="col-8 pb-2">
                <a href="main.php?page=Create new package" type="button" class="btn btn_create_new_package"><img src="../../ASSET/ICON/PACKAGE/bx-plus.svg" class="img_create_new_package"> Create new package</a>
            </div>
            <div class="col-4">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_package" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword" autocomplete="off">
                    <button class="btn btn_search_package" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table_package table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name packages</th>
                            <th>Created at</th>
                            <th>Creatad by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($packagesList as $packages) : ?>
                            <tr>
                                <td>
                                    <p class="txt_content_package"><?php echo $no; ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_package"><?php echo $packages['name_package']; ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_package"><?php echo date('d-m-Y', strtotime($packages['created_at'])); ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_package"><?php echo $packages['created_by']; ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_package"><?php echo date('d-m-Y', strtotime($packages['updated_at'])); ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_package"><?php echo $packages['updated_by']; ?></p>
                                </td>
                                <td>
                                    <a class="btn btn_edit_package" href="main.php?page=Edit package&id=<?php echo $packages['pk_id_packages']; ?>" type="button" title="Edit"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_edit_package"></a>
                                    <a class="btn btn_delete_package" href="main.php?page=Delete package&id_package=<?php echo $packages['pk_id_packages']; ?>" type="button" title="Delete"><img src="../../ASSET/ICON/PACKAGE/bxs-trash.svg" class="img_delete_package" data-bs-toggle="modal" data-bs-target="#delete"></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>