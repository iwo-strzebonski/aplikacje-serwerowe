'use strict'

for (let i = 0; i < document.getElementsByClassName('register').length; i++) {
    document.getElementsByClassName('register')[i].onclick = function() {
        document.getElementById('register').style.display='flex'
        document.getElementById('login').style.display='none'
    }
}

for (let i = 0; i < document.getElementsByClassName('login').length; i++) {
    document.getElementsByClassName('login')[i].onclick = function() {
        document.getElementById('register').style.display='none'
        document.getElementById('login').style.display='flex'
    }
}

for (let i = 0; i < document.getElementsByClassName('logout').length; i++) {
    document.getElementsByClassName('logout')[i].onclick = function() {
        location.href = './php/logout.php'
    }
}

for (let i = 0; i < document.getElementsByClassName('close').length; i++) {
    document.getElementsByClassName('close')[i].onclick = function() {
        this.parentNode.style.display = 'none'
    }
}

document.getElementById('currYear').innerText = new Date().getFullYear()
