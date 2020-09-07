window.onload = function(){
	document.getElementById("submit").onclick = getData;
}

function getData(){
	var xmlhttp = getXmlHttp()
	xmlhttp.open('post', '../index.php', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4){
			if (xmlhttp.status == 200) {
				document.getElementById("answer").innerHTML += xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send("user"+document.getElementById("user").value);
	return false;
}