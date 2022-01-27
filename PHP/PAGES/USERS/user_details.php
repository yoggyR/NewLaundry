<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Users</label>
    <label><span style="font-weight: bold; margin-left: -535px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Users" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_users.php');
$id          = $_GET['id'];
$userDetails = showUsers("SELECT * FROM m_positions 
INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions WHERE pk_id_users = $id")[0];
?>
<div class='row'>
    <div class="md-col-12">
        <div class="row">
            <div class="col-3">
                <img src="../../DATABASE/IMAGE/<?php echo $userDetails['photo']; ?>" class="img_user_details">
            </div>
            <div class="col-9">
                <table class="table table-borderless" style="font-size: 18px;">
                    <tr>
                        <td class="pb-4 fw-bold">Username</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['username']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 210px;" class="pb-4 fw-bold">Full name</td>
                        <td style="width: 10px;" class="fw-bold">:</td>
                        <td><?php echo $userDetails['full_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Place and date of brith</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['place_of_brith']; ?>, <?php echo date('d-m-Y', strtotime($userDetails['date_of_brith'])); ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Gender</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['gender']; ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Email</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Phone number</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['phone_number']; ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Position</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['position_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="pb-4 fw-bold">Address</td>
                        <td class="fw-bold">:</td>
                        <td><?php echo $userDetails['address']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>