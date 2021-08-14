<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student</title>
	 <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.container {
  padding: 10px;
}

</style>
<body>


    <nav>
    <div class="nav-wrapper #00695c teal darken-3">
      <a href="#" class="brand-logo center">Student</a>
      
    </div>
  </nav>




<!-- 
  <form class="" id="login_form" method="post">
  
    <div class="container">
      
     

     
        
      
      </div>
    </div>

  
  </form>
 -->




 <div class="container ">
    <div class="imgcontainer">
      
      <img src="img/bg.png" alt="Avatar" class="responsive-img z-depth-5" style="width: 20%;
  border-radius: 30%;">
    </div>
<fieldset style="border:3px solid teal;">
   <legend><h5 style="font-family: serif;">Login</h5></legend>
  <div class="row">
    <form class="col s12" method="POST" id="login_form">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
           <input type="text" placeholder="Enter Username" name="username" required autocomplete="OFF">
        
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input type="password" placeholder="Enter Password" name="password" required autocomplete="OFF">
        </div>
        <div class="center">


        <!--  <a class="waves-effect waves-light btn-large" type="submit" name="login_btn" style="border-radius:30px;"><i class="material-icons right">send</i>Submit</a> -->

         <input type="submit" name="login_btn" class="btn teal lighten-2" style="border-radius:30px;">
        </div>
      </div>
    </form>
  </div>
  <?php require 'process/login.php';?>
</fieldset>
</div>


</body>
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js">
</script>

</html>