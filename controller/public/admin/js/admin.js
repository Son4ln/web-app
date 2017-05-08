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








