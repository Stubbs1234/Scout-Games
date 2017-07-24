function checkForm()
{
var e = document.getElementById("mySelect");
var strUser = e.options[e.selectedIndex].value;
var e1 = document.getElementById("mySelect1");
var strUser1 = e1.options[e1.selectedIndex].value;
var result = true;

if (strUser1 == "PS") {
alert("Please select a section");
result = false;
} 
if (strUser == "PS") {
alert("Please select a reason");
	result = false; 
} 
if (exampleForm.name.value=="")
	  {
	  alert("Please enter your first name");
	  result = false;
	  }
if (exampleForm.email.value==""){
	alert("Please enter your email address");
	result = false; 
	}
	
	
return result;
}
