// JavaScript Document
var wordsNotAllowed = ["vagina", "sex", "penis", "porn", "pornstar", "nigger", "cunt", "fuck", "shit", "cock"];
var charsNotAllowed = ["~","`","!","#","$","%","^","&","*","+","=","-","[","]","\\","\'",";",",","/","{","}","|",'\"',":","<",">","?"];

var namevalid = false;
var usrvalid = false;
var passwdvalid = false;
var cypvalid = false;

var namemsg = "";
var usrmsg = "";
var passwdmsg = "";
var cypmsg = "";

function checkUsrname(username)
{
	if( username.value.length < 6 )
	{
		usrvalid = false;
		
		// Set new message
		usrmsg = "Username must be 6 or more charactors";
	}
	else if( isAllowed(username.value) == false )
	{
		usrvalid = false;
		
		// Set new message
		usrmsg = "Please enter something appropriate";
	}
	else if( containsSpecial(username.value) == false )
	{
		usrvalid = false;
		
		// Set new message
		usrmsg = "Cant contain special charactors e.g. *, \\ ";
	}
	else
	{
		var xmlhttp;
		//alert(username);
		if( window.XMLHttpRequest )
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function() 
		{	
			if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
			{
				if( xmlhttp.responseText == "true" ) 
				{
					usrvalid = false;
					
					// Set new message
					usrmsg = "Sorry, this username has allready been taken";
				}
				else 
				{
					usrvalid = true;
				}
			}
		}
		
		xmlhttp.open("GET", "php/checkusrname.php?user=" + username.value, true);
		xmlhttp.send();
	}
}

function checkPassword(password)
{
	if( password.value.length < 6 )
	{
		passwdvalid = false;
		
		// Set new message
		passwdmsg = "Password must be 6 or more charactors";
	}
	else if( isAllowed(password.value) == false )
	{
		passwdvalid = false;
		
		// Set new message
		passwdmsg = "Please enter something appropriate";
	}
	else if( containsSpecial(password.value) == false )
	{
		passwdvalid = false;
		
		// Set new message
		passwdmsg = "Cant contain special charactors e.g. *, \\ ";
	}
	else 
	{
		passwdvalid = true;
	}
}

function checkCypher(cypher)
{
	if( document.getElementById('teacher').checked == false && document.getElementById('student').checked == false )
	{
		cypvalid = false;
		
		// Set new message
		cypmsg = "Please select an account type";
	}
	else if( cypher.value.toLowerCase() == "nul" )
	{
		cypvalid = true;	
	}
	else if( cypher.value.length != 3 )
	{
		cypvalid = false;
		
		// Set new message
		cypmsg = "Cpyher must be 3 charactors";
	}
	else if( containsSpecial(cypher.value) == false )
	{
		cypvalid = false;
		
		// Set new message
		cypmsg = "Cant contain special charactors e.g. *, \\ ";
	}
	else
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
		
		xmlhttp.onreadystatechange = function() 
		{	
			if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
			{
				// If teacher is selected and cypher is allready registered to teacher 
				if(document.getElementById('teacher').checked == true && xmlhttp.responseText == "true")
				{
					cypvalid = false;
					
					// Set new message
					cypmsg = "There is allready a teacher registered to this cypher";
				}
				// If student is selected but no teacher is registered to cypher
				else if(document.getElementById('teacher').checked == false && xmlhttp.responseText == "false")
				{
					cypvalid = false;
					
					// Set new message
					cypmsg = "There is no teacher registered to this cypher";
				}
				else 
				{
					cypvalid = true;
				}
			}	
		}
		
		xmlhttp.open("GET", "php/checkcypher.php?cypher=" + cypher.value, true);
		xmlhttp.send();
	}
}

function checkName(fullname)
{
	if( isAllowed(fullname.value) == false )
	{
		namevalid = false;
		
		// Set new message
		namemsg = "Please enter something appropriate";
	}
	else if( containsSpecial(fullname.value) == false )
	{
		namevalid = false;
		
		// Set new message
		namemsg = "Cant contain special charactors e.g. *, \\ ";
	}
	else namevalid = true;
}

// Check to see if text is apropreate
function isAllowed(text)
{
	for( var i = 0; i < wordsNotAllowed.length; i++ )
	{
		if( text.toLowerCase().indexOf(wordsNotAllowed[i]) != -1 ) return false;	
	}
	return true;
}

function containsSpecial(text)
{
	for( var i = 0; i < charsNotAllowed.length; i++ )
	{
		if( text.indexOf(charsNotAllowed[i]) != -1 ) return false
	}
	return true;
}