<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>

<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2 pb-2">
            <div class="col-2 me-4">
                <a href="main.php?page=Customers" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Customers</p>
                        <h1 class="txt_body_bar_report">05</h1>
                        <img class="img_bar_report_customers" src="../../ASSET/ICON/PACKAGE/iconmonstr-user-22.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <a href="main.php?page=On process" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">On process</p>
                        <h1 class="txt_body_bar_report">03</h1>
                        <img class="img_bar_report_on_process" src="../../ASSET/ICON/PACKAGE/refresh-line.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <a href="main.php?page=Finished" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Finished</p>
                        <h1 class="txt_body_bar_report">01</h1>
                        <img class="img_bar_report_finished" src="../../ASSET/ICON/PACKAGE/flag-line.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <a href="main.php?page=Taken" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Taken</p>
                        <h1 class="txt_body_bar_report">01</h1>
                        <img class="img_bar_report_taken" src="../../ASSET/ICON/PACKAGE/bx-shopping-bag.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 ms-3">
                <label class="label_bar_report">
                    <p class="txt_head_bar_report">Profit</p>
                    <h1 class="txt_body_bar_report_profit">IDR 201.000</h1>
                    <img class="img_bar_report_profit" src="../../ASSET/ICON/PACKAGE/wallet-line.svg" alt="">
                    <p class="txt_powered_by_report_profit">Powered by Laundry&trade;</p>
                </label>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-2">
                <button class="btn btn_export_to_excel_report form-control" type="button">Export to excel<img src="../../ASSET/ICON/PACKAGE/file-excel-2-fill.svg" class="img_export_to_excel_report"></button>
            </div>
            <div class="col-3 ms-auto">
                <form class="d-flex">
                    <input class="form-control me-2 input_search_data_table_report" type="search" placeholder="Search data in the table" aria-label="Search">
                    <button class="btn btn_search_data_table_report" type="submit">Search</button>
                </form>
            </div>
            <div class="col-12 pt-2">
                <table class="table table-bordered table_report table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction code</th>
                            <th>Customers name</th>
                            <th>Packages name</th>
                            <th>Order</th>
                            <th>Process status</th>
                            <th>Payment status</th>
                            <th>Taken</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="txt_table_report">1</p>
                            </td>
                            <td>
                                <p class="txt_table_report">LNY-658481</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Yoggy Rachmawan</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Regular</p>
                            </td>
                            <td>
                                <p class="txt_table_report">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Finished [ 08-01-2022 ]</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Paid off</p>
                            </td>
                            <td>
                                <p class="txt_table_report">28-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">YoggyAdmin</p>
                            </td>
                            <td>
                                <p class="txt_table_report">09-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">YoggyAdmin</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="txt_table_report">2</p>
                            </td>
                            <td>
                                <p class="txt_table_report">LNY-658481</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Yoggy Rachmawan</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Regular</p>
                            </td>
                            <td>
                                <p class="txt_table_report">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">On process</p>
                            </td>
                            <td>
                                <p class="txt_table_report">Arrears</p>
                            </td>
                            <td>
                                <p class="txt_table_report">-</p>
                            </td>
                            <td>
                                <p class="txt_table_report">08-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">YoggyAdmin</p>
                            </td>
                            <td>
                                <p class="txt_table_report">09-01-2022</p>
                            </td>
                            <td>
                                <p class="txt_table_report">YoggyAdmin</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>