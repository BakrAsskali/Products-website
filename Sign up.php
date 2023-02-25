<!DOCTYPE html>
<html lang="en">
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box}

  input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  button:hover {
    opacity:1;
  }

  .container {
    padding: 16px;
  }

  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }


</style>
<body>

<form style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Creer un compte.</p>
    <hr>

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <div class="clearfix">
        <input type="Submit" value="Sign up!" name="submit">
    </div>
  </div>
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
    $username=$_POST['Username'];
    $password=$_POST['psw'];
    if($username!='' && $password!=''){
        $fp=fopen('users.txt','a');
        fwrite($fp,$username.'|'.$password);
        header("Location: Login.php");
    }else{
?><span><?php echo "Veuillez remplir tous les plan!";?></span><?php
    }
}
?>