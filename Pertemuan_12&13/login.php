<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPW 12 - Bootstrap & PHP</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 col d-flex justify-content-center">
        <div class="card" style="width: 40%;">
            <div class="card-body">
              <h2 class="card-title text-center">LOGIN</h2>
                <form method="post" action="./loginProces.php">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email...">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password...">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-block" value="Login">
                  </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>