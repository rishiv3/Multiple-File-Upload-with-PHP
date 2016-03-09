<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Multiple File Upload with PHP</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
  <input type="submit" value="Upload!" name="sub"/>
  </form>
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
