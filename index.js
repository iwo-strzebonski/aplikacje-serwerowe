for (i in document.getElementsByClassName('register')) {
    document.getElementsByClassName('register')[i].onclick = function() {
        document.getElementById('register').style.display='flex'
        document.getElementById('login').style.display='none'
    }
}

for (i in document.getElementsByClassName('login')) {
    document.getElementsByClassName('login')[i].onclick = function() {
        document.getElementById('register').style.display='none'
        document.getElementById('login').style.display='flex'
    }
}

for (i in document.getElementsByClassName('logout')) {
    document.getElementsByClassName('logout')[i].onclick = function() {
        location.href = './logout.php'
    }
}

for (i in document.getElementsByClassName('close')) {
    document.getElementsByClassName('close')[i].onclick = function() {
        this.parentNode.style.display = 'none'
    }
}

document.getElementById('currYear').innerText = new Date().getFullYear()
