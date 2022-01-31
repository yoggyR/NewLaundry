<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../CONFIG/connect_database.php');
include('../FUNCTIONS/functions_transaction.php');
$showReport = showTransaction("SELECT * FROM t_header
                                INNER JOiN m_packages ON t_header.fk_id_packages = m_packages.pk_id_packages
                                INNER JOIN m_users    ON t_header.fk_id_users = m_users.pk_id_users
                                ORDER BY updated_at_header DESC");
if (isset($_POST["search"])) {
    $showReport = searchTransaction($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2 pb-2">
            <div class="col-2 me-4">
                <?php
                $customers = mysqli_query($connect, "SELECT * FROM m_users WHERE fk_id_positions = 7");
                $totalCustomers = mysqli_num_rows($customers);
                $numCustomers = sprintf("%02d", $totalCustomers);
                ?>
                <a href="main.php?page=Customers" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Customers</p>
                        <h1 class="txt_body_bar_report"><?php echo $numCustomers ?></h1>
                        <img class="img_bar_report_customers" src="../../ASSET/ICON/PACKAGE/iconmonstr-user-22.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <?php
                $onProcess = mysqli_query($connect, "SELECT * FROM t_header WHERE laundry_status = 'On process'");
                $totalOnProcess = mysqli_num_rows($onProcess);
                $numOnProcess = sprintf("%02d", $totalOnProcess);
                ?>
                <a href="main.php?page=On process" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">On process</p>
                        <h1 class="txt_body_bar_report"><?php echo $numOnProcess ?></h1>
                        <img class="img_bar_report_on_process" src="../../ASSET/ICON/PACKAGE/refresh-line.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <?php
                $finished = mysqli_query($connect, "SELECT * FROM t_header WHERE laundry_status = 'Finished'");
                $totalFinished = mysqli_num_rows($finished);
                $numFinished = sprintf("%02d", $totalFinished);
                ?>
                <a href="main.php?page=Finished" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Finished</p>
                        <h1 class="txt_body_bar_report"><?php echo $numFinished ?></h1>
                        <img class="img_bar_report_finished" src="../../ASSET/ICON/PACKAGE/flag-line.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 me-4 ms-3">
                <?php
                $taken = mysqli_query($connect, "SELECT * FROM t_header WHERE laundry_status = 'Taken'");
                $totalTaken = mysqli_num_rows($taken);
                $numTaken = sprintf("%02d", $totalTaken);
                ?>
                <a href="main.php?page=Taken" type="button">
                    <label class="label_bar_report">
                        <p class="txt_head_bar_report">Taken</p>
                        <h1 class="txt_body_bar_report"><?php echo $numTaken ?></h1>
                        <img class="img_bar_report_taken" src="../../ASSET/ICON/PACKAGE/bx-shopping-bag.svg" alt="">
                        <p class="txt_powered_by_report">Powered by Laundry&trade;</p>
                    </label>
                </a>
            </div>
            <div class="col-2 ms-3">
                <?php
                $profit = showTransaction("SELECT * FROM t_header");
                ?>
                <?php foreach ($profit as $list) : ?>
                    <?php
                    $listProfit[] = $list['already'];
                    $totalProfit = array_sum($listProfit);
                    ?>
                <?php endforeach; ?>
                <label class="label_bar_report">
                    <p class="txt_head_bar_report">Profit</p>
                    <h1 class="txt_body_bar_report_profit">IDR <?php echo $formatProfit = number_format("$totalProfit", 0, ",", ".") ?></h1>
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
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_data_table_report" name="keyword" type="search" placeholder="Search data in the table" aria-label="Search" autocomplete="off">
                    <button class="btn btn_search_data_table_report" type="submit" name="search">Search</button>
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
                            <th>Laundry status</th>
                            <th>Payment status</th>
                            <th>Cretaed at</th>
                            <th>Cretaed by</th>
                            <th>Updated at</th>
                            <th>Updated by</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($showReport as $report) : ?>
                            <?php
                            $price          = $report['price'];
                            $already        = $report['already'];
                            $laundryStatus  = $report['laundry_status'];
                            ?>
                            <tr>
                                <td>
                                    <p class="txt_table_report"><?php echo $no ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['transaction_code']; ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['full_name'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['name_package'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo date('d-m-Y', strtotime($report['date_order'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['laundry_status'] ?></p>
                                </td>
                                <td>
                                    <?php if ($price == $already) {
                                        echo "
                                        <p class='txt_table_report'>Paid Off</p>";
                                    } else {
                                        echo "
                                        <p class='txt_table_report'>Arrears</p>";
                                    } ?>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo date('d-m-Y', strtotime($report['created_at_header'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['created_by_header'] ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo date('d-m-Y', strtotime($report['updated_at_header'])) ?></p>
                                </td>
                                <td>
                                    <p class="txt_table_report"><?php echo $report['updated_by_header'] ?></p>
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