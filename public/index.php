<!-- <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Heroku - Hello World!</title>
  </head>
  <body>
    <h1>Sadie Shirts!</h1>
<style>
h1 {
  color: teal;
  border: 3px teal solid;
  font-size: 6em;
  padding: 1em;
  margin: 0.5em;
  text-align: center;
  font-family: sans-serif;
}
</style>
  </body>
</html> -->


<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
<!--     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="css/subStyle.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8"> -->
    <title>Benefits Calculator</title>
  </head>
  <body>
    <!-- <?php include("phpincludes/subNav.php"); ?> -->
    <article id="merchandise">
      <h1 id="titleText"> Login </h1>
    </article>

    <form class="loginForm" method = "POST" action="login-handler.php">

        <section class="loginValues">
          <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="50" 
            <?php if(isset($_SESSION['presets']['email'])) { ?>
            value="<?= $_SESSION['presets']['email']?>">
            <?php } ?>
            <?php if(isset($_SESSION['errors']['email'])) { ?>
                    <span id ="emailError" class="error"><?= $_SESSION['errors']['email'] ?></span>
            <?php } ?>
          </p>
          <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php if(isset($_SESSION['errors']['password'])) { ?>
                    <span id="passwordError" class="error"><?= $_SESSION['errors']['password'] ?></span>
            <?php } ?>
          </p>
          <section>
            <section id="productDesc">
              <input id="button" type="submit" name="submit" value="LOGIN">
              <?php if(isset($_SESSION['errors']['message'])) { ?>
              <span id="matchError" class="error"><?= $_SESSION['errors']['message'] ?></span>
              <?php } ?>

            </section>
          </section>  
        </section>
        <!-- <section id="newUser">
          <a id="pageLink" href="registration.php" id="pageLink">NEW? CREATE AN ACCOUNT>></a>
        </section> -->
    </form>
    <?php unset($_SESSION['errors']);
      unset ($_SESSION['presets']);?>
  </body>
</html>