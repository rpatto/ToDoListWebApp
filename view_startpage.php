<!-- view_startpage.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>To-Do List Tracker</title>
    <style>
        #signupButton, #loginButton{
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-3 bg-primary text-white text-center">
        <h1>To-Do List Tracker</h1>
    </div>
    <div class="container mt-4">
        <div class="row">
            <h5 class="col-sm-12 text-center mt-5">
                A simple to-do list creator<br> app to help keep you organized
            </h5>
        </div>
        <div class="row mt-5">
            <div class="col-sm-6 text-center">
                <button id="signupButton" type="button" class="btn btn-primary btn-lg mt-4"  data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
            </div>
            <div class="col-sm-6 text-center">
                <button id="loginButton" type="button" class="btn btn-primary btn-lg mt-4 " data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
            </div>
        </div>
    </div>

    <!-- signup modal window -->
    <div class="modal" id="signupModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sign Up</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="StartPage">
                    <input type="hidden" name="command" value="SignUp">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="sername" placeholder="Enter username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                        <br><p><?php if (!empty($error_message_username)) echo $error_message_username; ?></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- login modal window -->
    <div class="modal" id="loginModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Log In</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="StartPage">
                    <input type="hidden" name="command" value="Login">
                    <input type="hidden" name="remember" value="unchecked">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="sername" placeholder="Enter username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" value="checked"> Remember me
                        </label>
                        <br><p><?php if (!empty($error_message_login)) echo $error_message_login; ?></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</body>
<script>
    var signUpModal = new bootstrap.Modal(document.getElementById('signupModal'), {
        keyboard: false
    })
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
        keyboard: false
    })
    <?php 
    if (!empty($display_modal)) {
        if ($display_modal == 'signUp'){
            echo 'signUpModal.show();';
        }
        else if ($display_modal == 'login'){
            echo 'loginModal.show();';
        }
    }
?>
</script>
</html>