function openWindow(url) {
    var features, w = 350, h = 450;
	var top = (document.documentElement.clientHeight - h)/2;
	var	left = (document.documentElement.clientWidth - w)/2; 
    if(top < 0) top = 0;
	if(left < 0) left = 0;
	features = 'top=' + top + ',left=' +left;
	features += ',height=' + h + ',width=' + w + ', scrollbars=no, menubar=no,toolbar=no, location=no,status=no,resizable=no';
	window.open(url,this.target,features);
    return false;
}

