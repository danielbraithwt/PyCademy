<html>
	<?php
		session_start();
		
		include 'php/includes.php';
		$con = mysql_connect($host, $user, $pass);
		if (!$con)
		{
  			echo "Failed to connect to MySQL";
  			exit();
		}

		mysql_select_db($db, $con);
		
		if( $_SESSION['acctype'] == 1 )
		{
			$result = mysql_query("SELECT * FROM usercode WHERE username='" . $_GET['username'] . "' AND topic='" . $_GET['topic'] . "'");
			$data = mysql_fetch_array($result);
		
			$code = $data['code'];
		}
		else $code = "You dont have permission to be doing this... Nice try though.";
	?>
	<head>
    <style type="text/css">
    .textarea {
		width: 100%;
		height: auto;
		box-sizing: border-box;
		-mos-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		resize: none;
		font-family:"Courier New", Courier, monospace;
		overflow:auto;
	
	}
	
	.title {
	height: auto;
	width: 300px;
	margin-right: auto;
	margin-left: auto;		
	}
    </style>
    
    <script type="text/javascript">
	
	window.onload = function()
	{
		var disallowedPythonLibraries = ["sys", "tkinter", "pickle", "socket"];
		
		var code = document.getElementById("code").value;
	
		var regex = new RegExp('\n', 'g');
		code = code.replace(regex, "\\n");
		regex = new RegExp('    ', 'g');
		code = code.replace(regex, "\\t");
		
		var allowed = true;
		
		for( var i = 0; i < disallowedPythonLibraries.length; i++ )
		{
			if( code.toLowerCase().indexOf("import " + disallowedPythonLibraries[i]) != -1 ) allowed = false;	
		}
		
		if( allowed == false )
		{
			//document.getElementById("output").innerHTML = "You are not allowed to import that library";
			document.getElementById("output").value = "You are not allowed to import that library";
			return 0;
		}
		
		var xmlhttp;
		
		if( window.XMLHttpRequest )
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		// Update the id of the fied so it dosent create thousands of new database entries
		xmlhttp.onreadystatechange = function() {	
			if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
			{
				//document.getElementById("output").innerHTML = xmlhttp.responseText;
				document.getElementById("output").value = xmlhttp.responseText;
			}
			else if( xmlhttp.status == 500 )
			{
				//document.getElementById("output").innerHTML = "Output from program was to large, program possibly has an infinit loop";
				document.getElementById("output").value = "Output from program was to large, program possibly has an infinit loop";
			}
		}
		
		xmlhttp.open("GET", "php/execute.php?code=" + code, true);
		xmlhttp.send();
	}
	
	</script>
    
	</head>
    
    <body>
    <div class="title">
    	<img src="images/code-title.png" width="300" height="113">
    </div>
    <textarea id="code" wrap="off" class="textarea" readonly onKeyUp="onCodeChange();"><?php echo $code; ?></textarea>
    <br>
    <div class="title">
    <img src="images/output-title.png" width="300" height="74">
    </div>
    <textarea id="output" wrap="off" class="textarea" readonly >Loading...</textarea>
    </body>
</html>