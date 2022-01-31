<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Report</label>
    <label><span style="font-weight: bold; margin-left: -532px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_transaction.php');
$showOnProcess = showTransaction("SELECT * FROM t_header
                        INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                        INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                        WHERE laundry_status = 'On process'");

if (isset($_POST["search"])) {
    $showReport = searchTransaction($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2">
            <div class="col-4 ms-auto pb-2">
                <form class="d-flex" action="" method="POST">
                    <input class=" form-control me-2 input_search_data_table_on_process" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword">
                    <button class="btn btn_search_data_table_on_process" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered table_on_process table-hover">
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
                        <?php foreach ($showOnProcess as $OnProcess) : ?>
                            <tr>
                                <td>
                                    <p class="txt_table_on_process"><?php echo $no ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo $OnProcess['transaction_code'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo $OnProcess['full_name'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_finished"><?php echo date('d-m-Y', strtotime($OnProcess['date_order'])) ?></p>
                                </td>
                                <td>
                                    <?php if ($OnProcess['date_estimate'] <= date('Y-m-d') || $OnProcess['date_estimate'] == date('Y-m-d')) : ?>
                                        <p class="txt_table_on_process"><?php echo $OnProcess['laundry_status'] ?> [ Ready ]</p>
                                    <?php endif; ?>
                                    <?php if ($OnProcess['date_estimate'] != date('Y-m-d') && $OnProcess['date_estimate'] >= date('Y-m-d')) : ?>
                                        <p class="txt_table_on_process"><?php echo $OnProcess['laundry_status'] ?> [ Not ready ]</p>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo date('d-m-Y', strtotime($OnProcess['created_at_header'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo $OnProcess['created_by_header'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo date('d-m-Y', strtotime($OnProcess['updated_at_header'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_on_process"><?php echo $OnProcess['updated_by_header'] ?></p>
                                </td>
                                <td>
                                    <a href="main.php?page=oft details&id=<?php echo $OnProcess['pk_id_header'] ?>" class="btn btn_on_process_details" type="button" title="On process details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_btn_on_process_details"></a>
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