<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Multiple File Upload with PHP</title>
</head>
<body>

  <h2>Upload Files:</h2>
  <!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
  <form method="post" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="files" multiple="" onChange="makeFileList();" accept="image/*" />
    <input type="submit" value="upload" name="upload">
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
        console.log(input.files);
        li.innerHTML = '<img src="'+input.files[i].name+'" alt="'+input.files[i].name+'">';
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
