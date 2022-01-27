<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Report</label>
    <label><span style="font-weight: bold; margin-left: -535px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
</div>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2">
            <div class="col-4 ms-auto pb-2">
                <form class="d-flex">
                    <input class="form-control me-2 input_search_data_finished" type="search" placeholder="Search data in the table" aria-label="Search">
                    <button class="btn btn_search_data_finished" type="submit">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered table_finished table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction code</th>
                            <th>Customers name</th>
                            <th>Order</th>
                            <th>Process status</th>
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
                                <p class="txt_table_finished">1</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">LNY-658481</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">Yoggy Rachmawan</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">Finished [ 12-01-2022 ]</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">YoggyAdmin</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">09-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_finished">YoggyAdmin</p>
                            </td>
                            <td>
                                <a href="main.php?page=Finished details" class="btn btn_finished_details" type="button" title="Finished details"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_btn_finished_details"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>