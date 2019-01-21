<?php 
    session_start(); 
    $myInputs = $_POST["myInputs"];
    foreach ($myInputs as $eachInput) {
         echo $eachInput."<br>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Benefits Calculator</title>
    <script type="text/javascript">
        var counter = 1;
        var limit = 15;
        function addFields(divName){
             if (counter == limit)  {
                  alert("You have reached the limit of adding " + counter + " inputs");
             }
             else {
                  document.createElement
                  var newdiv = document.createElement('input');
                  var newContent = document.createTextNode("dependent");
                  newdiv.appendChild(newContent);
                  document.getElementById(divName).appendChild(newdiv);
                  // var newdiv = document.createElement('div');
                  // newdiv.innerHTML = "Dependent " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
                  // document.getElementById(divName).appendChild(newdiv);
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
      
      <div id="addDiv">
        <a href="" onclick="addFields('addDiv')">Add Dependents</a>
        <div id="container"/>
      </div>

      <section>
        <p>Click below to SUBMIT new employee and/or dependents</p>
        <input id="button" type="submit" name="submit" value="ADD NEW">
      </section>
    </form>

    <section>
        <a href="index.php" id="pageLink">Back to Calculator</a><br>
    </section>

  </body>
</html>