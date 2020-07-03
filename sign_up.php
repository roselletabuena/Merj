<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="vendors/animate/animate.css">
    <script src="vendors/js/jquery-3.3.1.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>
    <script src="vendors/js/validator.min.js"></script>

    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="row" >
            <div class="col-sm-12 align">
                <div class="card w-100">
                    <div class="card-body">
                        <h3 class="fadeInUp slower">Sign up</h3>
                        <form data-toggle="validator" class="needs-validator" id="reg_form" role="form" enctype="multipart/form-data" validate>
                            <div class="form-group" align=center>
                                <div class="p-5">       
                                    <img id="image_prev" src="images/dp-icon.png" alt="Invalid image file" class="image-cover"/> 
                                </div>
                            </div>
                            <input type='file' onchange="readURL(this);" value="images/dp-icon.png" accept="image/x-png,image/gif,image/jpeg" id="display_pic" name="display_pic" align="left"/> <br>
                            <div class="form-group">
                                <label for="fname" class="control-label">First Name</label>
                                <input type="text" id="fname" name="fname" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control input-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="lname" class="control-label">Last Name</label>
                                <input type="text" id="lname" name="lname"  onkeypress="return /[a-z ]/i.test(event.key)" class="form-control input-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" id="username" name="username"  onkeypress="return /[a-z0-9_-]/i.test(event.key)" class="form-control input-sm" data-error="" required>
                                <div class="help-block data-error">username is already taken</div>
                            </div>
                            <div class="form-group">
                                <label for="contact_no"  class="control-label">Contact number</label>
                                <input type="text" id="contact_no" name="contact_no"  onkeypress="return /[0-9]/i.test(event.key)" maxlength="11" class="form-control input-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="email"  class="control-label">Email</label>
                                <input type="email" id="email" name="email"  onkeypress="return /[a-z.@]/i.test(event.key)" class="form-control input-sm" required>
                                <div class="help-block data-email">this email is already registered</div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" data-minlength="6" class="form-control input-sm" id="password" name="password" placeholder="Password" required>
                                    <div class="help-block">Minimum of 6 characters</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-sm" id="con_pass" name="con_pass" data-match="#password" data-match-error="Mismatch password" placeholder="Confirm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Submit" id="btnSubmit" class="form-control btn btn-primary form-control-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="controllers/sign_up.js"></script>
    <script src="vendors/new/js/bootstrap.min.js"></script>
    <script src="vendors/js/validator.min.js"></script>
</body>
</html>