<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Report</label>
    <label><span style="font-weight: bold; margin-left: -530px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
</div>
<div class='row'>
    <div class="md-col-12">
        <div class="row pb-3 pt-2">
            <div class="col-4 ms-auto pb-2">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_customer_report" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword" autocomplete="off">
                    <button class="btn btn_search_customer_report" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table_customers_report table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name customers</th>
                            <th>Phone number</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="txt_table_customers_report">1</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">Yoggy Rachmawan</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">0895801121100</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">10-01-1997</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">yoggyAdmin</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">10-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_customers_report">yoggyAdmin</p>
                            </td>
                            <td>
                                <a class="btn btn_customer_details_report" data-bs-toggle="modal" data-bs-target="#customerdetailsreport" type="button" title="Customer details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_customer_details_report"></a>
                            </td>
                        </tr>
                        <?php include('customer_details_report.php'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>