<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Report</label>
    <label><span style="font-weight: bold; margin-left: -530px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_transaction.php');
$showTaken = showTransaction("SELECT * FROM t_header
                        INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                        INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                        ORDER BY updated_at_header DESC");

if (isset($_POST["search"])) {
    $showReport = searchTransaction($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2">
            <div class="col-4 ms-auto pb-2">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_data_table_taken" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword">
                    <button class="btn btn_search_data_table_taken" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered table_taken table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction code</th>
                            <th>Customers name</th>
                            <th>Order</th>
                            <th>Laundry status</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($showTaken as $taken) : ?>
                            <?php if ($taken['laundry_status'] == 'Taken') : ?>
                                <tr>
                                    <td>
                                        <p class="txt_table_finished"><?php echo $no ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_finished"><?php echo $taken['transaction_code'] ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_finished"><?php echo $taken['full_name'] ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_finished"><?php echo date('d-m-Y', strtotime($taken['date_order'])) ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_finished"><?php echo $taken['laundry_status'] ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_finished"><?php echo date('d-m-Y', strtotime($taken['created_at_header'])) ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_on_process"><?php echo $taken['created_by_header'] ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_on_process"><?php echo date('d-m-Y', strtotime($taken['updated_at_header'])) ?></p>
                                    </td>
                                    <td>
                                        <p class="txt_table_on_process"><?php echo $taken['updated_by_header'] ?></p>
                                    </td>
                                    <td>
                                        <a href="main.php?page=oft details&code=<?php echo $taken['transaction_code'] ?>" class="btn btn_finished_details" type="button" title="Finished details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_btn_finished_details"></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>