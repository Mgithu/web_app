var doc=document,
	EventUtil = {
	addHandler:function(element,type,handler){
		if(element.addEventListener){
			element.addEventListener(type,handler,false);
		}else if (element.attachEvent){
			element.attachEvent("on"+type,handler);
		}else {
			element["on"+type]=handler;
		}
	},
	removeHandler:function(element,type,handler){
		if(element.removeEventListener){
			element.removeEventListener(type,handler,false);
		}else if (element.detachEvent){
			element.detachEvent("on"+type,handler);
		}else {
			element["on"+type]=null;
		}
	},
	getEvent:function(event){
		return event ? event:window.event;
	},
	getTarget:function(event){
		return event.target || event.srcElement;
	},
	preventDefault:function(event){
		if(event.preventDefault){
			eveny.preventDefault();
		}else{
			event.returnValue=false;
		}
	},
	stopPropagation:function(event){
		if(event.stopPropagation){
			event.stopPropagation();
		}else{
			event.cancelBubble=ture;
		}
	}
};

/*function checkLogForm(){
	var paper=doc.getElementById("help_info"),
		name=doc.getElementById("username"),
		psw=doc.getElementById("psw");
	if(name==null||name==""){
		paper.innerHTML="请输入用户名!";
		return false;
	}else if(psw==null||psw==""){
		paper.innerHTML="请输入密码!"
		return false;
	}else{
		return true;
	}
}

function checkRegForm(){
	var paper=doc.getElementById("help_info"),
		name=doc.getElementById("username"),
		psw_1=doc.getElementById("psw_1");
		psw_2=doc.getElementById("psw_2");
	if(name==null||name==""){
		paper.innerHTML="请输入用户名!";
		return false;
	}else if(psw_1!=psw_2||psw_1==null||psw_1==""||psw_2==null||psw_2==""){
		paper.innerHTML="两次密码不一致!"
		return false;
	}else{
		return true;
	}
}*/
