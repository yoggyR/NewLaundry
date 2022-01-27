<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span class="fw-bold"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_profile.php');
$id = $_GET['id'];
$changePassword = showProfile("SELECT * FROM m_users WHERE pk_id_users = $id")[0];
if (isset($_POST["save"])) {
    if (chagePassword($_POST) > 0) {
        echo "
            <script>
                alert ('successfully');
                document.location.href = 'main.php?page=My profile&id=" . $changePassword['pk_id_users'] . "';
            </script>";
    } else {
        echo "
        <script>
            alert ('failed');
        </script>";
    }
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="col-md-1">
                    <img src="../../ASSET/ILLUSTRATION/undraw_Preferences_re_49in.svg" class="img_change_password">
                </div>
                <div class="col-md-11">
                    <form action="" method="POST" class="form_change_password">
                        <input type="hidden" name="pk_id_users" value="<?php echo $changePassword['pk_id_users'] ?>">
                        <input type="hidden" name="pass_in_db" value="<?php echo $changePassword['password'] ?>">
                        <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                        <div class="mb-3">
                            <label for="Current password" class="form-label fw-bold">Current password</label>
                            <input type="password" class="form-control" id="Current password" placeholder="Enter your current password" name="currentPassword">
                        </div>
                        <div class="mb-3">
                            <label for="New password" class="form-label fw-bold">New password</label>
                            <input type="password" class="form-control" id="New password" placeholder="Enter new password" name="newPassword">
                        </div>
                        <div class="mb-3">
                            <label for="Confirm new password" class="form-label fw-bold">Confirm new
                                password</label>
                            <input type="password" class="form-control" id="Confirm new password" placeholder="Enter confirm new password" name="confirmNewpassword">
                        </div>
                        <div class="row">
                            <div class="col-4 ms-auto">
                                <button type="submit" class="btn btn_save_change_password form-control" name="save"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" class="img_btn_change_password">Save</button>
                            </div>
                            <div class="col-4">
                                <a href="main.php?page=My profile&id=<?php echo $changePassword['pk_id_users'] ?>" type="button" class="btn btn_cancel_change_password form-control"><img src="../../ASSET/ICON/PACKAGE/close-circle-fill.svg" class="img_btn_change_password">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>