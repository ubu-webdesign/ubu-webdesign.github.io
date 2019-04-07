function notEmpty(semester,aggregatorName){
	var e = document.getElementById(semester);
	var strUser = e.options[e.selectedIndex].value;
	document.getElementById(aggregatorName).innerHTML = strUser;
}

