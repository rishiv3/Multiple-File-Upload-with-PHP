# Multiple File Upload with PHP
When the HTML form is submitted, the server-side PHP code can validate and upload the file.

This is a simple HTML form, there won't be any styles, since we'r focusing on the **PHP upload**.

### HTML
```HTML

<h2>Upload Files:</h2>
<!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
<form method="post" action="upload.php" enctype="multipart/form-data">
  <input type="file" name="files" id="files" multiple="" onChange="makeFileList();" />
</form>	

<p>
  <strong>Files You Selected:</strong>
</p>

<ul id="fileList">
  <li>No Files Selected</li>
</ul>
```

Simply adding the multiple attribute allows for multiple files to be uploaded via one INPUT element.

### Listing All Files

```JavaScript
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
```

## Moving to the server 

```PHP
session_start();

if (isset($_POST["submit"]))
{
  if(count($_FILES['file']['name'])) 
  {        
  $target="uploads/";               
  $count=0;

    foreach ($_FILES['file']['name'] as $filename) 
    {
      $temp=$target;
      $tmp=$_FILES['file']['tmp_name'][$count];
      $count=$count + 1;
      $temp=$temp.basename($filename);
      move_uploaded_file($tmp,$temp);
      $temp='';
      $tmp='';
    }
  }
}
```
