<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
    <label style="color: rgb(134, 133, 133);">Users</label>
    <label><span style="font-weight: bold; margin-left: -530px;"> / <?php echo ($pages); ?> </span></label>
    <a href="main.php?page=Users" type="button" class="btn-close" title="Close this page"></a>
</div>
<?php
include('../FUNCTIONS/functions_users.php');
$position = showUsers("SELECT * FROM m_positions WHERE status = 'Employee'");
if (isset($_POST["save"])) {
    if (addDataUSer($_POST) > 0) {
        echo "
            <script>
                alert ('New user added successfully');
                document.location.href = 'main.php?page=Users'; 
            </script>";
    } else {
        echo "
        <script>
            alert ('New user failed to add !!!');
        </script>";
    }
}
?>
<div class='row'>
    <div class="md-col-12">
        <div class="countainer">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="created_by" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="update_by" value="<?php echo $_SESSION['username'] ?>">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="mt-2">
                            <label for="Fullname" class="form-label fw-bold">Full name</label>
                            <input type="text" name="full_name" class="form-control" id="Fullname" placeholder="Enter full name" autocomplete="off" required>
                        </div>
                        <div class="mt-2">
                            <label for="Username" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" id="Username" placeholder="Enter username" autocomplete="off" required>
                        </div>
                        <div class="mt-2">
                            <label for="datepicker" class="form-label fw-bold">Place and date of brith</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="place_of_brith" class="form-control" placeholder="Enter place of birth" autocomplete="off" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="date_of_brith" class="form-control icon_calendar_new_user" id="datepicker" placeholder="Enter date of birth" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="Gender" class="form-label fw-bold">Gender</label>
                            <select id="Gender" name="gender" class="form-select" required>
                                <option selected>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="Email" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" id="Email" placeholder="Enter email" autocomplete="off" required>
                        </div>
                        <div class="mt-2">
                            <label for="Phone number" class="form-label fw-bold">Phone number</label>
                            <input type="text" name="phone_number" class="form-control" id="Phone number" placeholder="Enter phone number" autocomplete="off" required>
                        </div>
                        <div class="mt-2">

                            <label for="Gender" class="form-label fw-bold">Position</label>
                            <select id="Gender" name="fk_id_positions" class="form-select" required>
                                <option>Choose...</option>
                                <?php foreach ($position as $name) : ?>
                                    <option value="<?php echo $name['pk_id_positions']; ?>"><?php echo $name['position_name']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="mt-2">
                            <label for="Address" class="form-label fw-bold">Address</label>
                            <textarea type="text" name="address" class="form-control" id="Address" placeholder="Enter address" autocomplete="off" required></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="Password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" id="Password" placeholder="Enter password" autocomplete="off" required>
                        </div>
                        <div class="mt-2">
                            <label for="Confirm password" class="form-label fw-bold">Confirm password</label>
                            <input type="password" name="confrim_password" class="form-control" id="Confirm password" placeholder="Enter confirm password" autocomplete="off" required>
                        </div>
                        <div class="mt-2">
                            <label for="Photo" class="form-label fw-bold">Photo</label>
                            <input type="file" name="photo" accept="image/*" class="form-control" id="Photo">
                        </div>
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <div class="col-4 ms-auto">
                                    <button class="btn btn_save_new_user form-control" name="save" type="submit" title="Save"><img src="../../ASSET/ICON/PACKAGE/bxs-save.svg" class="img_btn_save_new_user"> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>