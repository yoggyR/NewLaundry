<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Report</label>
    <label><span style="font-weight: bold; margin-left: -530px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_customers.php');
$customers = showCustomers("SELECT * FROM m_positions 
INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions WHERE status = 'Client'");
if (isset($_POST["search"])) {
    $customers = searchCustomer($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pb-3 pt-2">
            <div class="col-4 ms-auto pb-2">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_customer_list" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword" autocomplete="off">
                    <button class="btn btn_search_customer_list" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table_customer_list table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name customers</th>
                            <th>Phone number</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($customers as $list) : ?>
                            <tr>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $no ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['full_name'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['phone_number'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo date('d-m-Y', strtotime($list['created_at'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['created_by'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo date('d-m-Y', strtotime($list['updated_at'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['updated_by'] ?></p>
                                </td>
                                <td>
                                    <a class="btn btn_customer_details" data-bs-toggle="modal" data-bs-target="#customerdetails<?php echo $list['pk_id_users'] ?>" type="button" title="Customer details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_customer_details"></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <?php include('customer_details_report.php'); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>