<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form action="" method="post" name="Login_Form">
        <table>
          <tr>
            <td><h3>Login</h3></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input name="Username" type="text" class="Input"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="Password" type="password" class="Input"></td>
          </tr>
          <tr>
            <td> </td>
            <td><input name="Submit" type="submit" value="Login" class="Button"></td>
          </tr>
        </table>
      </form>
</body>
<?php
session_start();
include "Createdb.php";
if (isset($_POST['Submit'])) {
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

$sql = "SELECT * FROM Admins";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($Username == $row['adminName']){
        echo "login succesfully";
    }
    else {
    echo "Password is wrong";
    }
    exit;
  }

}
}
?>
    <!-- // if (isset($login[$Username]) &&  $login[$Username] == $Password) {
    //     // $_SESSION['Userdata']['Username'] = $Username;
    //     header("location: admin.php");
    //     exit;
    // }
    // else {
    //     $Msg = "<span style='color: red'> Invalid Login Details </span>";
    //     echo $Msg;
    // } -->
</html>

