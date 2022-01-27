<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/beginning.css">
    <!-- /LINK CSS -->
    <!-- LINK LOGO -->
    <link rel="shortcut icon" href="../../ASSET/LOGO/johnny-automatic-Services-5.svg">
    <!-- /LINK LOGO -->
</head>

<body>
    <div class="countainer con_all">
        <div class="row receptacle_verification shadow">
            <div class="col-md-12">
                <form>
                    <h2 class="txt_label_verification">Verification</h2>
                    <img src="../../ASSET/ILLUSTRATION/undraw_security_o890.svg" alt="" class="img_verification">
                    <p class="txt_description_verification">Enter the verification code we just send you on your email address.</p>

                    <div class="row g-2 form_input_code_verification mb-3">
                        <div class="col-md-2">
                            <input type="text" class="form-control" maxlength="1" style="text-align: center; font-weight: bold;" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" maxlength="1" style="text-align: center; font-weight: bold;" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" maxlength="1" style="text-align: center; font-weight: bold;" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" maxlength="1" style="text-align: center; font-weight: bold;" onkeypress="return event.charCode>= 48 && event.charCode <=57">
                        </div>
                    </div>
                    <a class="w-100 btn btn-lg btn_verification mb-2" type="submit" href="../BEGINNING/new_password.php">Verify</a>
                    <p class="mt-2">Did you remember your password? <span><a class="btn_try_FVC" href="../BEGINNING/log_in.php">Try logging in</a></span></p>
                    <p class="txt_copyright_FVC">&copy;2021 Laundry&trade;</p>
                </form>
            </div>
        </div>
        <!-- LINK JAVASCRIPT -->
        <script src="../../JS/bootstrap.js"></script>
        <!-- /LINK JAVASCRIPT -->
</body>

</html>