<?php session_start(); ?>
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
      <input type="number" name="em_id">
    
      <section>
        <input id="button" type="submit" name="submit" value="CALCULATE">
      </section>
    </form>

    <section>
        <a href="newEmployee.php" id="pageLink">Add New Employee</a><br>
        <a href="newDependent.php" id="pageLink">Add New Dependent</a>
    </section>

  </body>
</html>
</html>