<?php 
    session_start()
?>
<form action="login.php" method="POST">
<div class="alert">fill all the fieldset out!</div>
    <label for="">Put Your Email*</label>
    <input type="email" name="email" id="email"><br>
    <label for="">Put Your Password*</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="submit" name="submit">
</form>

<style>
    *{
        background-color: #29233f;
        background-image: url(/static/images/modules/copilot/copilot-grid.webp)
        
    }
 form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 150px auto;
}

input[type="email"],
input[type="password"] {
  padding: 10px;
  margin: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 300px;
  font-size: 16px;
  font-family:'Courier New', Courier, monospace;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;   
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
.alert{
    display: none;
}
label{
    color: #3e8e41;
}
</style>
<?php 
if(isset($_POST['submit'])){
    if(!empty($_POST["email"]) and !empty($_POST["password"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
    }
    else{
        ?> 
        <style>
            .alert{
                display: block;
                color: red;
                font-weight: bold;
                border-bottom: 1px solid red;
                font-size: 25px;
                
            }
        </style>
<?php } } ?>
<?php 
    if(($_SERVER["REQUEST_METHOD"] == "POST" )){
        if($email == "user@supnum.mr" and $password==123){
            $_SESSION['email'] = "user" ;
            $_SESSION['password'] = 123 ;
        }
    }
    if(isset($_POST['submit'])){
        include("./importData.php");
    }
?>
<a href="logout.php" >logout</a>
