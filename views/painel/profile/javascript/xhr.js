var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if(xhr.eadystate == 4 ) {
        console.log(xhr);
    }
}



