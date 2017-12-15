var myApplication={};
myApplication.createFirBtn=doc.getElementsByClassName("create")[0];
myApplication.createSecBtn=doc.getElementsByClassName("create")[1];
/*myApplication.finishFirBtn=doc.getElementsByClassName("bingo")[0];
myApplication.finishSecBtn=doc.getElementsByClassName("bingo")[1];
myApplication.deleteFirBtn=doc.getElementsByClassName("delete")[0];
myApplication.deleteSecBtn=doc.getElementsByClassName("delete")[1];*/
	
/*
 * 初始化任务名称，默认为新建任务
 */
myApplication.inputName=function(){
	var name=prompt("请输入任务名称"),
		nameDefault="新建任务";
	if(name==null)  	return "error";
	while(name.lastIndexOf(" ")>=0){
      name=name.replace(" ","");
    }
	if(name=="")		return nameDefault;
	else 				return name;
},
/*
 * 任务完成，任务变得不可更改，且由特殊样式标识
 */
myApplication.finishTask=function(){
	/*var par=this.parentNode;
	var gra=par.parentNode;
	var name=this.nextElementSibling.value;
	var copy=doc.getElementById("copy").children[1];
	console.log(copy.children[1]);
	copy.children[1].innerHTML=name;
	gra.replaceChild(copy,par);*/
	console.log(this)
	var par=this.parentNode;
};
/*
 * 删除任务，任务从列表和数据库中擦除
 */
myApplication.deleteTask=function(){
	var par=this.parentNode,
		gra=par.parentNode;
	gra.removeChild(par);
};
/*
 * 创建任务，新建任务添加至列表及数据库中
 */
myApplication.createTask=function (){
	var copy=doc.getElementById("copy").children[0],
		list=this.nextElementSibling,
		news=copy.cloneNode(true),
		name=myApplication.inputName();
	if(name!=="error"){
		news.children[1].value=name;
		news.children[1].placeholder=name;
		list.appendChild(news);
	}
};

EventUtil.addHandler(myApplication.createFirBtn,"click",myApplication.createTask);
EventUtil.addHandler(myApplication.createSecBtn,"click",myApplication.createTask);
