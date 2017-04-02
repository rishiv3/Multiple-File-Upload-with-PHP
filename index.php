<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Multiple File Upload with PHP</title>
</head>
<body>
 
  <h2>Upload Files:</h2>
  <!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
  <form method="post" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="files" id="files" multiple="" onChange="makeFileList();" accept="image/*" />
  </form>	

  <p>
    <strong>Files You Selected:</strong>
  </p>

  <ul id="fileList"><li>No Files Selected</li></ul>
  
  <script>
    function makeFileList() {
      var input = document.getElementById("files");
      var ul = document.getElementById("fileList");
      while (ul.hasChildNodes()) {
        ul.removeChild(ul.firstChild);
      }
      for (var i = 0; i < input.files.length; i++) {
        var li = document.createElement("li");
        li.innerHTML = input.files[i].name;
        ul.appendChild(li);
      }
      if(!ul.hasChildNodes()) {
        var li = document.createElement("li");
        li.innerHTML = 'No Files Selected';
        ul.appendChild(li);
      }
    }
  </script>
</body>
</html>
<?php
    //This code uploads the files into 'uploads' directory inside the root directory
if(isset($_POST['sub']))
{
        
        $loc=$_SERVER['DOCUMENT_ROOT']."uploads/";
        $i=sizeof($_FILES['files']['name']);
        $err=0;
        for($j=0;$j<$i;$j++)
        {
            if(move_uploaded_file($_FILES['files']['tmp_name'][$j],$loc.$_FILES['files']['name'][$j]))
            {
                
            }
            else
            {
                $err++;
            }
        }
        if($err==0)
        {
?>
            <script>alert('Done Successfully');</script>
<?php
        }
        if($err>0)
        {
?>
            <script>alert('There is some error in it');</script>
<?php
        }
}
?>
