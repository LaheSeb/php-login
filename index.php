<?php


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <main class="form-signin">
  <form method="POST">
    
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name ="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name ="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <br><br><br>
    <button type="button" onclick="window.location.href='afficher.php'" class="w-100 btn btn-lg btn-primary">Ajouter un user</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–{{< year >}}</p>
  </form>
  <?php print_r("<br>email = '" .$_POST['email']."'")?>
  <?php print_r("<br>password = '" .$_POST['password']."'")?>
</main>

  </body>

</html>