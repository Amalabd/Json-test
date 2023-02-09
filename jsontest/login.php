<?php
require("register.php") ?>

<?php
if(isset($_POST['submit']))
{    
    
     $user = new register ($_POST['username'], $_POST['password']);
    
   

   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    
    <style>
       
        text{align:center;};
    </style>
        
    <nav class="navbar navbar-expand-lg navbar-light .bg-secondary bg-secondary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Login</a>

                
                  
                </div>
              </div>
            </div>
          </nav>

          <div class="page-header m-5">
                        <h2>Contact Form</h2>
                    </div>
          <div class="container m-5">

          <!----------Form ---->
          
          <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="m-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="username" >
          </div>
          <div class="m-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" name="password" >
          </div>
         
          <div class="m-3">
          <input type="submit" value="Submit" name= "submit">
           </div>

<!--------- Im using @ to prevent failer message ----->
           <p class="success"><?php echo @$user->fail ?></p>
           <p class="fail"><?php echo @$user->success ?></p>
           </form> 
        </div>

        
        



</body>
</html>































