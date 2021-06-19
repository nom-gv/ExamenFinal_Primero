var c1 = document.getElementById("F1P2C");
var c2 = document.getElementById("F1P2A");

var c3 = document.getElementById("F1P4C");
var c4 = document.getElementById("F1P4A");

if(c1 != null) {
	c1.onclick = function () {
		var input = document.getElementsByClassName('obligatorio');
		for(i=0; i<input.length; i++) {
			input[i].setAttribute("required", "");
		}
	}
}
if(c2 != null) {
	c2.onclick = function () {
	var input = document.getElementsByClassName('obligatorio');
		for(i=0; i<input.length; i++) {
			input[i].removeAttribute("required", "");
		}	
	}	
}


if(c3 != null) {
	c3.onclick = function () {
		var input = document.getElementsByClassName('obligatorio');
		for(i=0; i<input.length; i++) {
			input[i].setAttribute("required", "");
		}
	}
}
if(c4 != null) {
	c4.onclick = function () {
	var input = document.getElementsByClassName('obligatorio');
		for(i=0; i<input.length; i++) {
			input[i].removeAttribute("required", "");
		}	
	}	
}


