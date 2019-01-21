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
    <title>Benefits Calculator</title>
  </head>
  <body>
    <header>
          <h1 id="titleText"> Employee Benefits Calculator </h1>
    </header>
    
    <form method="POST" action="handler.php"> <!-- method = "POST" action="handler.php" -->
      <label for="em_id">Employee ID:</label>
      <input type="number" name="em_id"<?php if(isset($_SESSION['presets']['em_id'])) { ?> value="<?= $_SESSION['presets']['em_id']?>"
            <?php } ?> >
            <?php if(isset($_SESSION['results']['total'])) { ?>
                    <span><?= $_SESSION['results']['total'] ?></span>
            <?php } ?>
      <section>
        <input id="button" type="submit" name="submit" value="CALCULATE">
      </section>
    </form>

    <section>
        <a href="newEmployee.php" id="pageLink">Add New Employee</a><br>
        <a href="newDependent.php" id="pageLink">Add New Dependent</a>
    </section>

    <?php unset($_SESSION['errors']);
    unset ($_SESSION['presets']);
    unset ($_SESSION['results']);
    require_once('phpincludes/session-helper.php');
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }?>

  </body>
</html>
</html>