$('div.alert').delay(3000).slideUp();

function delConfirm (msg) {
    if(window.confirm(msg)){
        return true;
    }
    return false;
 }

 function goback() {
    history.back(-1)
}

function showMes(){
	if (typeof(Storage) !== "undefined") {
		if(!sessionStorage.mes){
			document.getElementById('showMes').style.display = 'none';
			return false;
		}
		document.getElementById('showMes').innerHTML = sessionStorage.mes;
		document.getElementById('showMes').style.display = 'block';
		$('.alert').addClass(sessionStorage.typeOfMes);
		sessionStorage.clear();
		return true;
	} else {
	    document.write('Trình duyệt của bạn không hỗ trợ local storage');
	}
}
showMes();









