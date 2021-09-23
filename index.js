for (i in document.getElementsByClassName('register')) {
    document.getElementsByClassName('register')[i].onclick = function() {
        document.getElementById('register').style.display='block'
        document.getElementById('login').style.display='none'
    }
}

for (i in document.getElementsByClassName('login')) {
    document.getElementsByClassName('login')[i].onclick = function() {
        document.getElementById('register').style.display='none'
        document.getElementById('login').style.display='block'
    }
}

