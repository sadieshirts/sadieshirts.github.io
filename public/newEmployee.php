<?php 
    session_start(); 
    $f_names = $_POST["f_names"];
    $l_names = $_POST["l_names"];
    foreach ($f_names as $f_input) {
         echo $f_input."<br>";
    }
    foreach ($l_names as $l_input) {
         echo $l_input."<br>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
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
                  newdiv.innerHTML = "Dependent " + (counter + 1) + " <br><label for=\"firstname\">First Name:</label><input type=\"text\" name=\"f_names[]\" maxlength=\"50\"> <label for=\"lastname\">Last Name:</label><input type=\"text\" name=\"l_names[]\" maxlength=\"50\">";
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
    
    <form> <!-- method = "POST" action="handler.php" -->
      
      <label for="firstname">First Name:</label>
      <input type="text" name="firstname" maxlength="50">
      <label for="lastname">Last Name:</label>
      <input type="text" name="lastname" maxlength="50">
      
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

  </body>
</html>