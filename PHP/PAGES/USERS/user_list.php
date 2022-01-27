<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span style="font-weight: bold;"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_users.php');
$usersList = showUsers("SELECT * FROM  m_positions 
INNER JOIN m_users ON m_positions.pk_id_positions  =  m_users.fk_id_positions WHERE status = 'Employee'");
if (isset($_POST["search"])) {
    $usersList = searchUser($_POST["keyword"]);
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row pt-2">
            <div class="col-8 pb-1">
                <a href="main.php?page=New user" type="button" class="btn btn_add_new_user"><img src="../../ASSET/ICON/PACKAGE/bx-plus.svg" class="img_btn_add_new_user"> Add new user</a>
            </div>
            <div class="col-4">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 input_search_user" type="search" placeholder="Search data in the table" aria-label="Search" name="keyword" autocomplete="off">
                    <button class="btn btn_search_user" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered table_users table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Phone number</th>
                            <th>Position</th>
                            <th>Created at</th>
                            <th>Created by</th>
                            <th>Update at</th>
                            <th>Update by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($usersList as $list) : ?>
                            <tr>
                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $no; ?>
                                    </p>
                                </td>

                                <td>
                                    <p>
                                        <img src="../../DATABASE/IMAGE/<?php echo $list['photo']; ?>" class="img_user_list">
                                    </p>
                                </td>

                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['username']; ?>
                                    </p>
                                </td>

                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['gender']; ?>
                                    </p>
                                </td>

                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['phone_number']; ?>
                                    </p>
                                </td>

                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['position_name']; ?>
                                    </p>
                                </td>

                                <td>
                                    <p class="txt_table_users">
                                        <?php echo date('d-m-Y', strtotime($list['created_at'])); ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['created_by']; ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="txt_table_users">
                                        <?php echo date('d-m-Y', strtotime($list['updated_at'])); ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="txt_table_users">
                                        <?php echo $list['updated_by']; ?>
                                    </p>
                                </td>

                                <td>
                                    <a class="btn btn_details_users" type="button" title="User details" href="main.php?page=User details&id=<?php echo $list['pk_id_users']; ?>"><img src="../../ASSET/ICON/PACKAGE/iconmonstr-id-card-1.svg" class="img_btn_details_users"></a>

                                    <a class="btn btn_delete_users" type="button" title="Delete" href="main.php?page=Delete user&id=<?php echo $list['pk_id_users']; ?>"><img src="../../ASSET/ICON/PACKAGE/bxs-trash.svg" class="img_btn_delete_users" data-bs-toggle="modal" data-bs-target="#delete"></a>
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