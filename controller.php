<?php
require('model.php');

if (empty($_POST['page'])) {
    if(isset($_COOKIE["loginStatus"])){
        include('view_listPage.php');
        exit();
    }
    else{
        include("view_startpage.php");
        exit();
    }
} 

$page = $_POST['page'];

if ($page == 'StartPage') {
    $command = $_POST['command'];
    switch($command) {
        case 'Login':
            if (user_valid($_POST['username'], $_POST['pswd'])){
                if($_POST["remember"]=="checked"){
                    setcookie("loginStatus", $_POST['username'], time() + (86400 * 30));
                }
                else{
                    setcookie("loginStatus", $_POST['username'], 0,);
                }
                $_COOKIE["loginStatus"] = $_POST['username'];
                include('view_listPage.php');
                exit();
            }
            else{
                //wrong username or password error
                $display_modal = "login";
                $error_message_login = "**Incorrect Username or Password**";
                include("view_startpage.php");
                exit();
            }
        case 'SignUp':
            if(user_exists($_POST['username']) == false){
                signup_user($_POST['username'], $_POST['pswd']);
            }
            else{
                //username already exists error
                $display_modal = "signUp";
                $error_message_username = "**User already exists**";
                include("view_startpage.php");
                exit();
            }
            include('view_startpage.php');
            exit();
        default:
            exit();
    }
}
else if($page == 'ListPage'){
    $command = $_POST["command"];
    switch($command){
        case "signout":
            setcookie("loginStatus", "", time()-3600);
            include("view_startpage.php");
            exit();
        case "createList":
            add_list($_POST["name"], $_POST["description"], $_COOKIE["loginStatus"]);
            include("view_listPage.php");
            exit();
        case "ListAll":
            echo all_list($_COOKIE["loginStatus"]);
            exit();
        case "delete":
            delete_list_row($_POST["listId"]);
            exit();
        case "toList":
            include("view_listItemPage.php");
            exit();
        case "changeUsername":
            if(user_exists($_POST['name']) == false){
                change_username($_COOKIE["loginStatus"], $_POST['name']);
                setcookie("loginStatus", $_POST['name'], 0,);
                $_COOKIE["loginStatus"] = $_POST['name'];
            }
            else{
                //username already exists error
                $display_modal = "changUsername";
                $error_message_username = "**User already exists**";
            }
            include('view_listPage.php');
            exit();
        case "changePassword":
            change_password($_COOKIE["loginStatus"], $_POST['password']);
            include('view_listPage.php');
            exit();
        case "deleteAccount":
            delete_user($_COOKIE["loginStatus"]);
            setcookie("loginStatus", "", time()-3600);
            include('view_startpage.php');
            exit();
        default:
            exit();
    }
}
else if($page == 'ListItemPage'){
    $command = $_POST["command"];
    switch($command){
        case "signout":
            setcookie("loginStatus", "", time()-3600);
            include("view_startpage.php");
            exit();
        case "changeUsername":
            if(user_exists($_POST['name']) == false){
                change_username($_COOKIE["loginStatus"], $_POST['name']);
                setcookie("loginStatus", $_POST['name'], 0,);
                $_COOKIE["loginStatus"] = $_POST['name'];
            }
            else{
                //username already exists error
                $display_modal = "changUsername";
                $error_message_username = "**User already exists**";
            }
            include('view_listItemPage.php');
            exit();
        case "changePassword":
            change_password($_COOKIE["loginStatus"], $_POST['password']);
            include('view_listItemPage.php');
            exit();
        case "deleteAccount":
            delete_user($_COOKIE["loginStatus"]);
            setcookie("loginStatus", "", time()-3600);
            include('view_startpage.php');
            exit();
        case "addItem":
            add_list_item(($_POST["item"]), $_COOKIE["listId"]);
            include('view_listItemPage.php');
            exit();
        case "ListAllItems":
            echo all_list_item($_COOKIE["listId"]);
            exit();
        case "delete":
            delete_list_item($_POST["listId"]);
            exit();
        case "changeStatus":
            change_status($_POST["listId"], $_POST["status"]);
            exit();
        default:
            exit();
    }

}
?>