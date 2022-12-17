<?php
$conn = mysqli_connect('localhost', 'f3rpattinson', 'f3rpattinson136', 'C354_f3rpattinson');

function user_exists($u) {  // It returns a Boolean value.
    global $conn;
    $sql = "select * from Final_Users where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function signup_user($u, $p) {
    global $conn;
    $sql = "insert into Final_Users values(NULL, '$p', '$u')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function user_valid($u, $p) {  // It returns a Boolean value.
    global $conn;
    $sql = "select * from Final_Users where Username = '$u' and Password = '$p'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function add_list($listName, $description, $username){
    global $conn;
    $sql = "insert into Lists values(NULL, '$listName', '$description', '$username')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function list_exist($list){
    global $conn;
    $sql = "select * from Lists where ListName = '$list'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function all_list($u){
    global $conn;
    $sql = "select * from Lists where username = '$u'";
    $result = mysqli_query($conn, $sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    
    return json_encode($rows);
}

function delete_list_row($id){
    global $conn;
    $sql = "delete from Lists where id = " . $id;
    $result = mysqli_query($conn, $sql);
}

function change_username($uOld, $u){
    global $conn;
    $sql = "update Final_Users set username = '$u' where username = '$uOld'";
    $result = mysqli_query($conn, $sql);
    $sql = "update Lists set username = '$u' where username = '$uOld'";
    $result = mysqli_query($conn, $sql);
}

function change_password($u, $p){
    global $conn;
    $sql = "update Final_Users set password = '$p' where username = '$u'";
    $result = mysqli_query($conn, $sql);
}

function delete_user($u){
    global $conn;
    $sql = "delete from Final_Users where username = '$u'";
    $result = mysqli_query($conn, $sql);
    $sql = "delete from Lists where username = '$u'";
    $result = mysqli_query($conn, $sql);
}

function add_list_item($item, $listId){
    global $conn;
    $sql = "insert into List_Items values(NULL, '$item', '$listId', 'incomplete ')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function all_list_item($id){
    global $conn;
    $sql = "select * from List_Items where ListId = '$id'";
    $result = mysqli_query($conn, $sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    
    return json_encode($rows);
}

function delete_list_item($id){
    global $conn;
    $sql = "delete from List_Items where id = " . $id;
    $result = mysqli_query($conn, $sql);
}

function change_status($id, $status){
    global $conn;
    $sql = "update List_Items set status = '$status' where id = '$id'";
    $result = mysqli_query($conn, $sql);
}
?>