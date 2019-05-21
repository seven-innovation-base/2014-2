function abcTab(x,y){
		var cont=document.getElementById("change"+x).getElementsByTagName("li");
		var mlt=document.getElementById("second"+x).getElementsByTagName("ul");
		for(i=0;i<cont.length;i++){
		cont[i].className=i==y?"hover":"";
		mlt[i].style.display=i==y?"block":"none";
		}
	}
