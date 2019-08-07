function AddToMenu() {
	
function calcTotal() {
	var shoppinglist=document.getElementById("shoppinglist");
	var total=0;
	for(i=0;i<shoppinglist.children.length;i++) {
		total+=parseFloat(shoppinglist.children[i].getAttribute("data-value"));
	}
	var totalresult=document.getElementById("totalresult");
	totalresult.innerHTML="&pound;"+total.toFixed(2);
}

function getTargetElement(e) {
	var targetelement=null;
	targetelement=(e.srcElement || e.target || e.toElement)
	return targetelement;
}

function handleEvent(e) {
	var listclicked=getTargetElement(e);
console.log(listclicked);
var newlistitem=document.createElement("li");
	var datavalue=listclicked.getAttribute("data-value");
	newlistitem.setAttribute("data-value",datavalue);
	newlisttext=document.createTextNode(listclicked.innerHTML)
	newlistitem.appendChild(newlisttext);
	var shoppinglist = document.getElementById("shoppinglist");
	shoppinglist.appendChild(newlistitem);
	newlistitem.addEventListener("click", removeChild, false);
	newlistitem.addEventListener("click", calcTotal, false);

}

function removeChild(e){
	clickeditem = getTargetElement(e);
	clickeditem.parentNode.removeChild(clickeditem);
}


document.onreadystatechange = function(){
	if(document.readyState=="complete") {
	var sourcelist=document.getElementById("sourcelist");
			var totalbutton=document.getElementById("calctotal");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
		
	var sourcelist=document.getElementById("sourcelist2");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
	var sourcelist=document.getElementById("sourcelist3");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
}
}
		
		

}