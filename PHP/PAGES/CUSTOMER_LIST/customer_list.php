<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
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
            <div class="col-8 pb-2">
                <a data-bs-toggle="modal" data-bs-target="#addnewcustomer" type="button" class="btn btn_add_new_customer"><img src="../../ASSET/ICON/PACKAGE/bx-plus.svg" class="img_add_new_customer">
                    Add new customer
                </a>
                <?php include('add_new_customer.php'); ?>
            </div>
            <div class="col-4">
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
                                    <p class="txt_content_customer_list"><?php echo $list['created_at'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['created_by'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['updated_at'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_content_customer_list"><?php echo $list['updated_by'] ?></p>
                                </td>
                                <td>
                                    <a class="btn btn_customer_details" data-bs-toggle="modal" data-bs-target="#customerdetails<?php echo $list['pk_id_users'] ?>" type="button" title="Customer details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_customer_details"></a>
                                    <a class="btn btn_edit_customer" data-bs-toggle="modal" data-bs-target="#editcustomer<?php echo $list['pk_id_users'] ?>" type="button" title="Edit customer"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_edit_customer"></a>
                                    <a class="btn btn_delete_customer" type="button" title="Delete" href="main.php?page=Delete customer&id_customer=<?php echo $list['pk_id_users']; ?>"><img src="../../ASSET/ICON/PACKAGE/bxs-trash.svg" class="img_delete_customer"></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <?php include('customer_details.php'); ?>
                            <?php include('edit_customer.php'); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>