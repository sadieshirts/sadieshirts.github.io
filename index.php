<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
<!--     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
    <meta charset="UTF-8"> -->
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <title>Benefits Calculator</title>
  </head>
  <body>
    
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