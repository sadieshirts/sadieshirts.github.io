<?php 
    require_once("Dao.php");
    require_once('phpincludes/form-helper.php');
    require_once('phpincludes/session-helper.php');
    session_start(); 
    $dao = new Dao();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <title>Benefits Calculator</title>
    <script type="text/javascript">
        var counter = 0;
        var limit = 10;
        function addFields(divName){
             if (counter == limit)  {
                  alert("You have reached the limit of adding " + counter + " inputs");
             }
             else {
                  document.createElement
                  var newdiv = document.createElement('div');
                  newdiv.innerHTML = "<p id=\"dependent\">Dependent " + (counter + 1) + " </p><label for=\"firstname\">First Name:</label><input type=\"text\" name=\"f_names[]\" maxlength=\"50\"> <label for=\"lastname\">Last Name:</label><input type=\"text\" name=\"l_names[]\" maxlength=\"50\">";
                  document.getElementById(divName).appendChild(newdiv);
                  counter++;
             }
        }
  </script>
  </head>
  <body>
    <header>
          <h1 id="titleText"> Submit New Employee </h1>
    </header>
    
    <form method = "POST" action="empHandler.php"> 
      
      <label for="em_first_name">First Name:</label>
      <input type="text" name="em_first_name" maxlength="50" <?php if(isset($_SESSION['presets']['em_first_name'])) { ?> value="<?= $_SESSION['presets']['em_first_name']?>"
            <?php } ?> >
      <label for="em_last_name">Last Name:</label>
      <input type="text" name="em_last_name" maxlength="50" <?php if(isset($_SESSION['presets']['em_last_name'])) { ?> value="<?= $_SESSION['presets']['em_last_name']?>"
            <?php } ?> >
            <p>
            <?php if(isset($_SESSION['presets']['addedNew'])) { ?>
                    <span>Benefit Total: <?= $_SESSION['presets']['addedNew'] ?></span>
            <?php } ?>
            </p>
            <p>
            <?php if(isset($_SESSION['errors']['message'])) { ?>
                    <span class="error"><?= $_SESSION['errors']['message'] ?></span>
            <?php } ?>
            </p>
      
      <div>
        <a href="#" onclick="addFields('addDiv')">Add Dependents</a>
        <div id="container"/>
      </div>

      <section >
        <p>Click below to SUBMIT new employee and/or dependents</p>
        <input id="button" type="submit" name="submit" value="ADD NEW">
      </section>
    </form>

    <section id="addDiv">
        <a href="index.php" id="pageLink">Back to Calculator</a><br>
    </section>

    <?php unset($_SESSION['errors']);
        unset ($_SESSION['presets']);
        require_once('phpincludes/session-helper.php');
        if(session_status() === PHP_SESSION_NONE){
            session_start();
    }?>

  </body>
</html>