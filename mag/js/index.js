
function stopPrev(current_str) {
	if (current_str <= 0) return false;
	else return true;
}

function stopNext(current_str, all_amount) {
	if (current_str > all_amount) return false;
	else return true;
}
