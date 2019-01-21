<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Benefits Calculator</title>
    <script type="text/javascript">
        function addFields()
        {
          var div1 = document.createElement('div');
          // Get template data
          div1.innerHTML = document.getElementById('newlinktpl').innerHTML;
          // append to our form, so that template data
          //become part of form
          document.getElementById('container').appendChild(div1);
        }
  </script>
  </head>
  <body>
    <header>
          <h1 id="titleText"> Submit New Employee </h1>
    </header>
    
    <form> <!-- method = "POST" action="handler.php" -->
      
      <label for="firstname">First Name:</label>
      <input type="text" name="firstname" maxlength="50">
      <label for="lastname">Last Name:</label>
      <input type="text" name="lastname" maxlength="50">
      
      <section>
        <a href="#" onclick="addFields()">Add Dependents</a>
        <div id="container"/>
      </section>

      <section>
        <p>Click below to submit new employee and/or dependents</p>
        <input id="button" type="submit" name="submit" value="ADD NEW">
      </section>
    </form>

    <section>
        <a href="index.php" id="pageLink">Back to Calculator</a><br>
    </section>

  </body>
</html>