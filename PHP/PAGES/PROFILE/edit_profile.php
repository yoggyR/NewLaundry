<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label><span class="fw-bold"> <?php echo ($pages); ?> </span></label>
</div>
<?php
include('../FUNCTIONS/functions_profile.php');
$id = $_GET['id'];
$editMyProfile = showProfile("SELECT * FROM m_positions
INNER JOIN m_users ON m_positions.pk_id_positions = m_users.fk_id_positions WHERE pk_id_users = $id")[0];
if (isset($_POST['save'])) {
    if (editProfile($_POST) > 0) {
        echo "
            <script>
                alert ('Successfully');
                document.location.href = 'main.php?page=My profile&id=" . $editMyProfile['pk_id_users'] . "';
            </script>";
    } else {
        echo "
            <script>
                alert ('Failed');
            </script>";
    }
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="countainer">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pk_id_users" value="<?php echo $editMyProfile['pk_id_users'] ?>">
                <input type="hidden" name="updated_by" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="current_photo" value="<?php echo $editMyProfile['photo'] ?>">
                <div class="row">
                    <div class="col-4">
                        <img src="../../DATABASE/IMAGE/<?php echo $editMyProfile['photo'] ?>" class="img-thumbnail img_change_image_profile" alt="Foto profile">
                        <div>
                            <label for="change_image" class="label_btn_change_image"><img src="../../ASSET/ICON/PACKAGE/bxs-image.svg" class="img_edit_profile">
                                Change image
                            </label>
                            <input type="file" class="btn_change_image_profile form-control" id="change_image" accept="image/*" name="photo">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label fw-bold">Username</label>
                            <input type="text" value="<?php echo $editMyProfile['username'] ?>" class="form-control" id="formGroupExampleInput" placeholder="Enter your full name" name="username" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label fw-bold">Full name</label>
                            <input type="text" value="<?php echo $editMyProfile['full_name'] ?>" class="form-control" id="formGroupExampleInput" placeholder="Enter your full name" name="full_name" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="datepicker" class="form-label fw-bold">Place and date of brith</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" value="<?php echo $editMyProfile['place_of_brith'] ?>" name="place_of_brith" class="form-control" placeholder="Enter place of birth" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <input type="text" value="<?php echo date('d-m-Y', strtotime($editMyProfile['date_of_brith'])); ?>" name="date_of_brith" class="form-control icon_calendar" id="datepicker" placeholder="Enter date of birth" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Gender" class="form-label fw-bold">Gender</label>
                            <select id="Gender" name="gender" class="form-select">
                                <option selected>Choose...</option>
                                <?php
                                if ($editMyProfile['gender'] == 'Male') {
                                    echo   "<option value='Male' selected>Male</option> 
                                            <option value='Female'>Female</option>";
                                } else {
                                    echo   "<option value='Male'>Male</option> 
                                            <option value='Female' selected>Female</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label fw-bold">Email</label>
                            <input type="email" value="<?php echo $editMyProfile['email'] ?>" class="form-control" id="formGroupExampleInput2" placeholder="Enter your email" name="email" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label fw-bold">Phone number</label>
                            <input type="text" value="<?php echo $editMyProfile['phone_number'] ?>" class="form-control" id="formGroupExampleInput2" placeholder="Enter your phone number" name="phone_number" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label fw-bold">Position</label>
                            <input type="text" value="<?php echo $editMyProfile['position_name'] ?>" class="form-control" id="formGroupExampleInput2" placeholder="Your position" name="position_name" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label fw-bold">Address</label>
                            <textarea class="form-control" id="formGroupExampleInput2" placeholder="Enter your address" name="address" autocomplete="off"><?php echo $editMyProfile['address'] ?></textarea>
                        </div>
                    </div>

                    <div class="col-6 pb-3 ms-auto">
                        <div class="row">
                            <div class="col-4 ms-auto">
                                <button type="submit" class="btn btn_save_edit_profile form-control" name="save"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" class="img_edit_profile">Save</button>
                            </div>
                            <div class="col-4">
                                <a href="main.php?page=My profile&id=<?php echo $editMyProfile['pk_id_users'] ?>" type="button" class="btn btn_cancel_edit_profile form-control"><img src="../../ASSET/ICON/PACKAGE/close-circle-fill.svg" class="img_edit_profile">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>