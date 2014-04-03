<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/codecolors.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#container #content #tutorial #intepreter {
	height: 600px;
	width: 475px;
	/* [disabled]background-color: #FF0; */
	float: left;
	background-image: url(images/Tutorial-And-Interp-Background.gif);
}
#container #content #tutorial #tutorialtext #textbox {
	height: 540px;
	width: 445px;
	background-color: #FFF;
	overflow: scroll;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 5px;
	margin-left: 10px;
	text-align: left;
	font-family: Calibri;
	padding-top: 0px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
}
#container #content #tutorial #tutorialtext #slidecontroll {
	margin-right: 10px;
	margin-bottom: 5px;
	margin-left: 10px;
	/* [disabled]padding-bottom: 5px; */
}
#container #content #tutorial #intepreter #interpcontainer {
	height: 600px;
	width: 475px;
	/* [disabled]background-color: #FF0; */
	float: left;
	margin-right: 50px;
}
#container #content #tutorial #intepreter #interpcontainer #codebox {
	height: 380px;
	width: 455px;
	background-color: #FFF;
	margin: 10px;
}
#container #content #tutorial #intepreter #interpcontainer #output {
	height: 130px;
	width: 455px;
	background-color: #FFF;
	margin: 10px;
	text-align: left;
	font-family: "Courier New", Courier, monospace;
	overflow: auto;
	white-space: nowrap;
}
#container #content #tutorial #intepreter #interpcontainer #buttons {
	height: 30px;
	width: 455px;
	background-color: #FFF;
	margin: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
}

#container #content #tutorial #tutorialtext {
	height: 600px;
	width: 475px;
	/* [disabled]background-color: #FF0; */
	float: left;
	margin-right: 50px;
	background-image: url(images/Tutorial-And-Interp-Background.gif);
}
#container #content #tutorial #intepreter #interpcontainer #buttons #controllcontainer {
	height: auto;
	width: 220px;
	margin-right: auto;
	margin-left: auto;
}
#container #content #tutorial {
	height: 600px;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
}
.textarea {
	width: 100%;
	height: 100%;
	box-sizing: border-box;
	-mos-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	resize: none;
	font-family:"Courier New", Courier, monospace;
	overflow:auto;
	
}
.controllbutton {
	width: 100px;
	height: 30px;
	float: left;
	margin-right: 10px;
}
#advmsg {
	padding-top: 50px;
	padding-right: 10px;
	padding-left: 10px;
}
</style>

<?php include 'php/gettutorial.php'; ?>

<script src="js/codecolor.js"></script>
<script type="text/javascript">

var disallowedPythonLibraries = ["sys", "tkinter", "pickle", "socket"];

var id = "<?php echo $codedata['id']; ?>"
var topic = "<?php echo $_GET['topic']; ?>";
var text = String("<?php echo $tutorialtext; ?>");
var tutorialtext = text.split('//&lt;NEWSLIDE&gt;//');
for( var i = 0; i < tutorialtext.length; i++ )
{
	var start = 0;
	var end = 0;
	while( tutorialtext[i].indexOf("//CODE//", end) != -1 )
	{
		start = tutorialtext[i].indexOf("//CODE//", end);
		end = tutorialtext[i].indexOf("//CODE//", start+8);
		
		//alert(tutorialtext[i].substring(start+8, end));
		
		tutorialtext[i] = tutorialtext[i].substring(0, start) + colorTutorialCode(tutorialtext[i].substring(start+8, end)) + tutorialtext[i].substring(end+8, tutorialtext[i].length);
		end = end + 8;
	}
}

var count = 0;
var maxcount = tutorialtext.length;
var conditions = String("<?php echo $row['toadvance']; ?>").split(",");

var maxallowed = 0;
if(String("<?php echo $hasfinished; ?>") == "true") maxallowed = conditions.length;
else getnextchallenge();

var nextd = false;
var prevd = true;

window.onload = function()
{	
	//alert("<?php echo $isadvanced ?>");
	if( "<?php echo $_SESSION['fullname']; ?>" == "" ) 
	{
		document.getElementById("code").disabled = true;
		document.getElementById("run").disabled = true;
		document.getElementById("clear").disabled = true;
		maxallowed++;
	}
	if( "<?php echo $isadvanced ?>" == "1" )
	{
		document.getElementById("codebox").innerHTML = "<div id='advmsg'>This tutorial is ment to be compleated offline <a href='advinstall.php'>here is tutorial of how to install python on your home computer</a></div>";
	}
	
	document.getElementById("textbox").innerHTML = tutorialtext[0];
	
	document.getElementById("prevslide").disabled = prevd;
	document.getElementById("finish").disabled = true;
	updatebuttons();
}

function getnextchallenge()
{
	if(conditions[0] == "")
	{
		maxallowed = maxcount;
		return false;
	}
	
	for( var i = maxallowed; i < conditions.length; i++ )
	{
		if( conditions[i] == "NA" ) maxallowed++;
		else i = conditions.length;
	}
}

function nextslide()
{
	if( count+1 < maxcount ) count++;
	
	document.getElementById("textbox").innerHTML = tutorialtext[count];
	updatebuttons();
}

function prevslide()
{
	if( count-1 >= 0 ) count--;

	document.getElementById("textbox").innerHTML = tutorialtext[count];
	updatebuttons();
}

function updatebuttons()
{
	if( count == maxallowed || count+1 == maxcount ) nextd = true;
	else nextd = false;
	
	if( count == 0 ) prevd = true;
	else prevd = false;
	
	if( count+1 == maxcount ) 
	{
		document.getElementById("finish").disabled = false;
	}
	
	document.getElementById("prevslide").disabled = prevd;
	document.getElementById("nextslide").disabled = nextd;
}

function checkoutput(o)
{
	var tocheck = String(o).replace("(", "[");
	tocheck = tocheck.replace(")", "]");
	
	if( tocheck.toLowerCase() == conditions[maxallowed].toLowerCase() || conditions[maxallowed] == "*" ) 
	{
		maxallowed++;
		getnextchallenge();
	}
	updatebuttons();
}

// Run when the run button is clicked
function run()
{	
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
		document.getElementById("out").value = "You are not allowed to import that library";
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
			document.getElementById("out").value = xmlhttp.responseText;
			checkoutput(xmlhttp.responseText);
		}
		else if( xmlhttp.status == 500 )
		{
			//document.getElementById("output").innerHTML = "Output from program was to large, program possibly has an infinit loop";
			document.getElementById("out").value = "Output from program was to large, program possibly has an infinit loop";
		}
	}
	
	xmlhttp.open("GET", "php/execute.php?code=" + encodeURIComponent(code), true);
	xmlhttp.send();
}

// Run when the clear button is clicked 
function clearCode()
{
	var choice = window.confirm("Are you sure you want to clear your code?");
	if( choice == true ) document.getElementById("code").value = "";
	onCodeChange();
}

// Run when the text in the users code is changed
function onCodeChange()
{
	// Get code from text area
	var code = document.getElementById("code").value;
	
	// Replace new lines and tabs so they are preserved
	var regex = new RegExp('\n', 'g');
	code = code.replace(regex, "\\n");
	regex = new RegExp('    ', 'g');
	code = code.replace(regex, "\\t");
	
	//alert(code);
	
	// Create AJAX connection
	var xmlhttp;
	
	if( window.XMLHttpRequest )
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	// Execute AJAX connection
	xmlhttp.open("GET", "php/savecode.php?code=" + encodeURIComponent(code) + "&id=" + id + "&topic=" + topic, true);
	xmlhttp.send();
}

function finishlesson()
{
	if( "<?php echo $isadvanced ?>" == "0" )
	{
	  var xmlhttp;
	  
	  if( window.XMLHttpRequest )
	  {
		  xmlhttp = new XMLHttpRequest();
	  }
	  else
	  {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	  xmlhttp.open("GET", "php/finishlesson.php?topic=" + topic, true);
	  xmlhttp.send();
	  
	  xmlhttp.onreadystatechange = function() {	
		  if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
		  {
			  window.location.href = 'index.php';
		  }
	  }
	}
	else window.location.href = 'index.php';
	//window.location.href = 'index.php';
}

window.addEventListener('load', function() {
  var textarea = document.getElementById('code');
  textarea.addEventListener('keydown', function(e) {
    if (e.keyCode === 9) {
      e.preventDefault();
      e.stopPropagation();
	  var start = this.selectionStart;
	  var end = this.selectionEnd;
	  var target = e.target;
	  var value = target.value;
	  target.value = value.substring(0, start) + "	" + value.substring(end);
	  this.selectionStart = this.selectionEnd = start + 1;//"    ".length;
	  
	  onCodeChange();
    }
  });
});
//function colorCode()
//{
//	for( var i = 0; i < tutorialtext.length; i++ )
//	{
//		var text = tutorialtext[i];
//		var start = 0;
//		
//		while( (start = text.indexOf("<div id=\"code\">", start)) )
//		{
//		
//		}
//	}
//}

</script>

</head>

<body >

<div id="container">
	<div id="header">
    	<div id="logo"> <a href="index.php"><img src="images/logo.png" width="498" height="173" /></a> 
        
        </div>
   	  <div id="account">
        	<?php
			session_start();
			if( $_SESSION["fullname"] ) 
			{
				echo "Welcome " . $_SESSION["fullname"];
				echo " - ";
				echo "<a href='updatedetails.php'>Update Your Details</a>";
				echo " - ";
				if( $_SESSION['acctype'] == 1 )
				{
					echo "<a href='teacheroverview.php'>View Your Students Progress</a>";
					echo " - ";
				}
				echo "<a href='php/logout.php'>Logout</a>";
			}
			else echo "<a href='login.php'>Sign In</a> - <a href='signup.php'>Create An Account</a>";
		?>
        </div>
    </div>
    
    <div id="content">
    	<div id="tutorial">
        	<div id="tutorialtext">
           	  <div id="textbox">
                    
                </div>
                
                <div id="slidecontroll">
                    	<div style="float:left; padding-right:60px;">
                        	<button id="prevslide" class="controllbutton" onclick="prevslide()">Prevous Slide</button>
                        </div>
                        <div>
                        	<button id="finish" onclick="finishlesson()" class="controllbutton">Finish</button>
                        </div>
                        <div style="float:right">
                        	<button id="nextslide" class="controllbutton" onclick="nextslide()">Next Slide</button>
                        </div>
               </div>
            </div>
            <div id="intepreter">
           	  <div id="interpcontainer">
                	<div id="codebox">
                    	<textarea id="code" wrap="off" class="textarea" onkeyup="onCodeChange();"><?php echo $usercode; ?></textarea>
                    </div>
                    <div id="output">
                    	<textarea id="out" wrap="off" class="textarea" onkeyup="onCodeChange();" readonly="readonly"></textarea>
                  </div>
                  <div id="buttons">
                  	<div id="controllcontainer">
                  	<button id="run" class="controllbutton" onclick="run();" >RUN!</button>
                    <button id="clear" class="controllbutton" onclick="clearCode();" >CLEAR!</button>
                    </div>
                  </div>
                </div>
            </div>
      </div>
    </div>
    
  <div id="footer">
    </div>
</div>

</body>
</html>
