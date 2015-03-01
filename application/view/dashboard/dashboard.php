 <!-- navigation add javascript that rewrites the body of the dashboard--> 
    <div>
        <!-- <a href= "#" onClick = javascript() -->
        <script type="text/javascript">
          function dashShowHide(showHideDiv)
          {
              //user demographic first
              if (showHideDiv == "userDemograph") 
              {
                  document.getElementById("userDemograph").style.display = "block";
                  document.getElementById("fileUpload").style.display = "none";
                  document.getElementById("addGenus").style.display = "none";
                  document.getElementById("removeAdmin").style.display = "none";
              }

              if (showHideDiv == "fileUpload") 
              {
                  document.getElementById("userDemograph").style.display = "none";
                  document.getElementById("fileUpload").style.display = "block";
                  document.getElementById("addGenus").style.display = "none";
                  document.getElementById("removeAdmin").style.display = "none";
              }

              if (showHideDiv == "addGenus") 
              {
                  document.getElementById("userDemograph").style.display = "none";
                  document.getElementById("fileUpload").style.display = "none";
                  document.getElementById("addGenus").style.display = "block";
                  document.getElementById("removeAdmin").style.display = "none";
              }

              if (showHideDiv == "removeAdmin") 
              {
                  document.getElementById("userDemograph").style.display = "none";
                  document.getElementById("fileUpload").style.display = "none";
                  document.getElementById("addGenus").style.display = "none";
                  document.getElementById("removeAdmin").style.display = "block";
              }
          }
        </script>
    </div>

<div class="navigation"></br>
  <a onclick=dashShowHide("userDemograph")> DEMOGRAPHIC </a>
  <a onclick=dashShowHide("fileUpload")> UPLOAD </a>
  <a onclick=dashShowHide("addGenus")> GENUS ADDITION </a>  
  <a onclick=dashShowHide("removeAdmin")> ADMIN REMOVAL </a>
</div>

<div class="container">
    <h2>Dashboard</h2>
    <pre style="display:none">
     <u><bold>Features to be included:</bold></u>
       -Deactivation of accounts
	     -Administrative reactivation of accounts.
       -Administrative tools for demographic data reporting 
       -Entry of DNA mapping information
       -Improved entry of new phage categories, clusters, sub-clusters and genus
       -Addition of Cut location information
       -Improved entry of Phage cut information 
       -Validation of data from phageDB and nebcutter
    </pre>

 <div id="fileUpload" style="display:none">
 <form id='upload' enctype="multipart/form-data" action="dashboard/fileupload" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <div id="phageType" name="genus" style="display:block">
        <select id="opts" name="genusName">
      <?php 

        echo "<option value='null'> None </option>";
      foreach($genusList as $genus){

        echo "<option value=".$genus['GenusID'].">".$genus['Genus']." </option>"; 
      } 
      ?>
        </select>
        <label><input type='radio' name="filetype"  value=0 id='short' onchage=/>Short CSV</label>
        <label><input type='radio' name="filetype"  value=1 id='full' onchange=/>Full CSV</label>
        <label><input type='radio' name="filetype"  value=2 id='fasta' onchange=/>FASTA File</label>
    </div>

    <input type="hidden" name="MAX_FILE_SIZE" value="56320000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</div>
<div id="removeAdmin" style="display:none">
  <form>
    <div>
      <select id="admins">
      <?php 

      $counter = 0;
      foreach($adminList as $email){

        echo "<option value=".$counter.">".$email['EmailAddress']." </option>";
        $counter += 1;

      } 
      ?>

    </select>
    <input type="submit" value="Remove Admin"></br>
    </div>

  </form>
</div>
<div id = addGenus style="display:none">
  <form action='dashboard/addGenus' method='POST'>
    <label> New Genus Name: <input type='text' name='newGenus' text="Enter New Genus"></label>
    <input type='submit' value="Add Genus">
  </form>
</div>
<div id="userDemograph" style="display:block">
  SHOWING DEMOGRAPHIC INFORMATION
</div>
</div>
