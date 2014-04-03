// JavaScript Document

function colorTutorialCode(code)
{
	//code = colorString(code);
	//code = colorYellowWords(code);
	
	return "<div id='pythoncontainer'>" + code + "</div>";
}

function colorInterpCode(code)
{
	
}

function colorString(code)
{
	var start = 0;
	var end = 0;
	//alert(code);
	while( code.indexOf("\"", end) != -1 )
	{
		//alert(code);
		start = code.indexOf("\"", end);
		end = code.indexOf("\"", start+2);	
		
		code = code.substring(0, start) + "<p class='green'>" + code.substring(start, end+1) + "</p>" + code.substring(end+1, code.length);
		end = end + 22;
	}
	
	return code;
}

function colorYellowWords(code)
{
	words = ["if", "elif", "else", "and", "or", "while", "for", "print", "break", "continue", "def", "import", "class"];
	
	for( var i = 0; i < words.length; i++ )
	{
		var start = 0;
		
		while( code.indexOf(words[i], start) != -1 )
		{
			start = code.indexOf(words[i], start);
			var b = code.substring(0, start);
			
			alert(code.charAt(start-1));
			
			if( code.charAt(start-1) == "/" ) 
			{
				alert(code.substring(0, start-2));
				alert(code.substring(start, code.length));
				code = code.substring(0, start-2) + code.substring(start, code.length);
				start = start + words[i].length;
			}
			else if( code.substring(start-3, start) != "<p " ) 
			{
				//alert(code.charAt(start-1));
				if( ( b.lastIndexOf("</p>") < b.lastIndexOf("<p class='green'>") && b.lastIndexOf("</p>") != -1 ) || b.lastIndexOf("<p class='green'>") == -1 )
				{
					code = code.substring(0, start) + "<p class='yellow'>" + words[i] + "</p>" + code.substring(start + words[i].length, code.length);
					start = start + 23 + words[i].length;	
				}
				else start = start + words[i].length;
			}
			else start = start + words[i].length;
		}
	}
	
	return code;
}

function colorPurpleWords(code)
{
	words = ["True", "False"];
	
	for( var i = 0; i < words.length; i++ )
	{
		var start = 0;
		
		while( code.indexOf(words[i], start) != -1 )
		{
			start = code.indexOf(words[i], start);
			var b = code.substring(0, start);
			
			//alert(b);
			
			if( code.charAt(start-1) == "/" ) 
			{
				
				code = code.substring(0, start-2) + code.substring(start, code.length);
				start = start + words[i].length;
			}
			else if( code.substring(start-3, start) != "<p " ) 
			{
				//alert(code.charAt(start-1));
				if( ( b.lastIndexOf("</p>") < b.lastIndexOf("<p class='green'>") && b.lastIndexOf("</p>") != -1 ) || b.lastIndexOf("<p class='green'>") == -1 )
				{
					code = code.substring(0, start) + "<p class='purple'>" + words[i] + "</p>" + code.substring(start + words[i].length, code.length);
					start = start + 23 + words[i].length;	
				}
				else start = start + words[i].length;
			}
			else start = start + words[i].length;
		}
	}
	
	return code;
}