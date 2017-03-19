function openWindow(url) {
    var features, w = 350, h = 450;
	//var top = (document.documentElement.clientHeight - h)/4;
	var	left = (document.documentElement.clientWidth - w)/2; 
    //if(top < 0) top = 0;
	if(left < 0) left = 0;
	features = 'top=' + 100 + ',left=' +left;
	features += ',height=' + h + ',width=' + w + ', scrollbars=no, menubar=no,toolbar=no, location=no,status=no,resizable=no';
	window.open(url,this.target,features);
}

function stopPrev(current_str) {
	if (current_str <= 0) return false;
	else return true;
}

function stopNext(current_str, all_amount) {
	if (current_str > all_amount) return false;
	else return true;
}