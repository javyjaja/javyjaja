
var css = '#btn:hover{ background-color: #00ff00 } #btn{ background-color: #0000FF }';
var style = document.createElement('style');

if (style.styleSheet) {
    style.styleSheet.cssText = css;
} else {
    style.appendChild(document.createTextNode(css));
}




var o = document.getElementById("btn");

o.style.color="#fff";

o.style.borderColor = "#2e6da4";

    o.style.display= "inline-block";
    o.style.padding= "6px 12px";
    o.style.marginBottom= "0";
    o.style.fontSize= "14px";
    o.style.fontWeight= "400";
    o.style.lineHeight= "1.42857143";
    o.style.textAlign= "center";
    o.style.whiteSpace= "nowrap";
    o.style.verticalAlign= "middle";
	
	o.appendChild(style);
	
	o.onclick= myModal;
	
	function myModal()
	{
		alert("AQUI LA PANTALLA");
		getUser();
	}
	
	//cosumir api de ejemplo
	function getUser2() {
    var xhttp = new XMLHttpRequest();
   
    xhttp.open("POST", "https://baas.kinvey.com/user/kid_SyXkBdMVM/login", false);
    xhttp.setRequestHeader("Content-Type", "application/json");
	xhttp.setRequestHeader("X-Kinvey-API-Version", "3");
	xhttp.setRequestHeader("Authorization", "Basic a2lkX1N5WGtCZE1WTToyOGQwOThmOTQ0N2Q0OWNmYmI0MTUwN2FjOWU3MDZiOA==");
	var params = '{"username":"javyjaja","password":"123456"}';
	
	
	 xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             alert(this.responseText);
         }
    };
	xhttp.send(params);
}
	
	
	function getUser() {
    var xhttp = new XMLHttpRequest();
   
    xhttp.open("POST", "http://localhost:64391/api/Values", false);
    xhttp.setRequestHeader("Content-Type", "application/json");
	xhttp.setRequestHeader("key", "12546");
	var params = '{"value" : "jhr"}';
		
	 xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             alert(this.responseText);
         }
    };
	xhttp.send(params);
}
	
	
	
	
	
	

