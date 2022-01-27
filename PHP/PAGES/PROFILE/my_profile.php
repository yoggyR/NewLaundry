<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span class="fw-bold"> <?php echo ($pages); ?> </span></label>
    <?php if ($_SESSION['position_name'] == "Cashier") : ?>
        <a href="main.php?page=Home" type="button" class="btn-close" title="Close this page"></a>
    <?php endif ?>
    <?php if ($_SESSION['position_name'] == "Admin") : ?>
        <a href="main.php?page=Report" type="button" class="btn-close" title="Close this page"></a>
    <?php endif ?>
</div>
<?php
include('../FUNCTIONS/functions_profile.php');
$id = $_GET['id'];
$myProfile = showProfile("SELECT * FROM m_positions
INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions WHERE pk_id_users = $id")[0];
?>
<div class='row'>
    <div class="md-col-12">
        <div class="container pt-3">
            <div class="row justify-content-center">
                <div class="col-4">
                    <img src="../../DATABASE/IMAGE/<?php echo $myProfile['photo'] ?>" class="img-thumbnail img_my_profile" alt="Profile">
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Username</label>
                        <p><?php echo $myProfile['username'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Full name</label>
                        <p><?php echo $myProfile['full_name'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Place and date of brith</label>
                        <p><?php echo $myProfile['place_of_brith'] ?>, <?php echo date('d-m-Y', strtotime($myProfile['date_of_brith'])); ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Gender</label>
                        <p><?php echo $myProfile['gender'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Email</label>
                        <p><?php echo $myProfile['email'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Phone Number</label>
                        <p><?php echo $myProfile['phone_number'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Position</label>
                        <p><?php echo $myProfile['position_name'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label fw-bold">Address</label>
                        <p><?php echo $myProfile['address'] ?></p>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <a type="button" href="main.php?page=Edit profile&id=<?php echo $myProfile['pk_id_users']; ?>" class="btn btn_edit_and_change form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_btn_my_profile">Edit profile</a>
                            </div>
                            <div class="col-4">
                                <a type="button" href="main.php?page=Change password&id=<?php echo $myProfile['pk_id_users']; ?>" class="btn btn_edit_and_change form-control"><img src="../../ASSET/ICON/PACKAGE/bxs-edit.svg" class="img_btn_my_profile">Change password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>