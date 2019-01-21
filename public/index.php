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
  </head>
  <body>
    <header>
          <h1 id="titleText"> Employee Benefits Calculator </h1>
          <p id="testing"> For testing purposes, employee's IDs start at 1, and are in increments of 10. </p>
          <p id="testing"> (i.e. 1, 11, 21, etc.)</p>
    </header>
    
    <form method="POST" action="handler.php">
      <label for="em_id">Employee ID:</label>
      <input type="number" name="em_id"<?php if(isset($_SESSION['presets']['em_id'])) { ?> value="<?= $_SESSION['presets']['em_id']?>"
            <?php } ?> >
            <p>
            <?php if(isset($_SESSION['results']['total'])) { ?>
                    <span>Benefit Total: <?= $_SESSION['results']['total'] ?></span>
            <?php } ?>
            </p>
            <p>
            <?php if(isset($_SESSION['errors']['message'])) { ?>
                    <span class="error"><?= $_SESSION['errors']['message'] ?></span>
            <?php } ?>
            </p>
      <section>
        <input id="button" type="submit" name="submit" value="CALCULATE">
      </section>
    </form>

    <section>
        <a href="newEmployee.php" id="pageLink">Add New Employee</a><br>
        <!-- In future iterations, I would add a page to add new dependents to existing employees. -->
        <!-- <a href="newDependent.php" id="pageLink">Add New Dependent</a> -->
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