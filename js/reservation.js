'use strict'

for (let i = 0; i < document.getElementsByClassName('hours').length; i++) {
    document.getElementsByClassName('hours')[i].onclick = function() {
        const show_dt = this.parentNode.id + ' ' + this.innerText
        location.href += `&show_dt=${show_dt}`
    }
}
