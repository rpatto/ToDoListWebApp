<!-- view_listPage.php -->
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
        
    </style>
</head>
<body>
    <div class="navbar container-fluid p-3 bg-primary text-white text-center">
        <div class="dropdown">
            <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                Options
            </button>
            <ul class="dropdown-menu">
                <li><button class='dropdown-item'data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button></li>
                <form action="controller.php" method="POST">
                <input type="hidden" name="page" value="ListPage">
                    <input type="hidden" name="command" value="signout">
                    <li><button type="submit" class="dropdown-item">Sign Out</button></li>
                </form>
            </ul>
            </div>
        <h1 class="mx-auto">To-Do List Tracker</h1>
    </div>

    <div class="container mt-3">
        <div class="row">
            <h5 class="col-sm-12 text-center mt-4">
                Welcome Back <?php echo $_COOKIE["loginStatus"];?>
            </h5>
        </div>
        <div class="row mt-1">
            <div class="col-sm-3 text-center">
                <button id="createListButton" type="button" class="btn btn-primary btn-lg mt-3"  data-bs-toggle="modal" data-bs-target="#createListModal">Add New To-Do List</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5 class="mt-4">
                    To-Do Lists
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p id='out'>
                    
                </p>
            </div>
        </div>
    </div> 

    <form id='toList' action='controller.php' method='POST'>
        <input type='hidden' name='page' value='ListPage'>
        <input type='hidden' name='command' value='toList'>
    </form>

    <!-- Add to do list modal -->
    <div class="modal" id="createListModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New To-Do List</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="ListPage">
                    <input type="hidden" name="command" value="createList">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">List Name:</label>
                        <input type="text" class="form-control" id="sername" placeholder="Enter list name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Description:</label>
                        <input type="text" class="form-control" id="pwd" placeholder="Enter description" name="description">
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

    <!-- Edit Profile modal window -->
    <div class="modal" id="editProfileModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container mt-3">
                    <div class="row">
                        <button style="width: 200px;" id="" type="button" class="btn btn-primary m-1 col"  data-bs-toggle="modal" data-bs-target="#changeUsernameModal">Change Username</button>
                        <button style="width: 200px;" id="" type="button" class="btn btn-primary m-1 col"  data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                        <button style="width: 200px;" id="" type="button" class="btn btn-primary m-1 col"  data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Delete Account</button>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!--  Change Username modal -->
    <div class="modal" id="changeUsernameModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Change Username</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="ListPage">
                    <input type="hidden" name="command" value="changeUsername">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Enter New Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter list name" name="name">
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

    <!-- Change Password modal -->
    <div class="modal" id="changePasswordModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="ListPage">
                    <input type="hidden" name="command" value="changePassword">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Enter New Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password">
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

    <!-- Delete account modal -->
    <div class="modal" id="deleteAccountModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Account</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="controller.php" method="POST">
                    <input type="hidden" name="page" value="ListPage">
                    <input type="hidden" name="command" value="deleteAccount">
                    <button type="submit" class="btn btn-primary">Press to Delete Account</button>
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
$( document ).ready(function() {
    renderTable();
});

function renderTable(){
    var page = "ListPage"
    $.post("controller.php", {page: page, command: "ListAll"}, function(data) {
        var rows = JSON.parse(data);
        var t = "<table class='table table-hover table-striped'>";
            t += '<tr>';
            t += "<th>List Name</th> <th>Description</th> <th>Delete</th>";
            t += "</tr>";
            for(var i = 0; i < rows.length; i++){ //for each row
                t += "<tr id='"+rows[i]['id']+"'>";
                t += "<td>" + rows[i]['ListName'] + "</td>";
                t += "<td>" + rows[i]['Description'] + "</td>";
                t += "<td>";
                t += "<button type='button' id='" + rows[i]['id'] + "'>Delete</button>";
                t += "</td>";
                t += "</tr>";
            }
        t += "</table>";
        
        $('#out').html(t);  // display the table
        
        //delete row button
        $('table button[id]').click(function(e) {
            if(!$(e.target).is('tr')){
                var id = $(this).attr('id');
                
                $.post("controller.php", {page: "ListPage", command: "delete", listId: id});
            }
            $(this).closest("tr").remove();
        });

        //enter list button
        $('tr[id]').click(function(e){
            var id = $(this).attr('id');
            document.cookie = "listId="+id+";"
            
            $("#toList").submit();
        });
    
    });
}


var usernameModal = new bootstrap.Modal(document.getElementById('changeUsernameModal'), {
  keyboard: false
})

<?php 
    if (!empty($display_modal)) {
        if ($display_modal == 'changUsername'){
            echo 'usernameModal.show();';
        }
    }
?>
</script>
</html>