<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-color.min.css" >

    <!-- Additional CSS -->
    <link rel="stylesheet" href="css/main.css" >

    <title>EQUIPMENT LIBRARY - Login</title>
  </head>
  <body>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-12 col-md-4 mx-auto">
               
            <div class="card ">
                    <div class="card-header">
                        Login 
                    </div>
                    <div class="card-body">
                        <form method="post" action="login-query.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username"  name="username" placeholder="Enter username" required>
                            
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <small><p style="color:red">Incorrect Username or Password</small>
                            </div>
                           
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>