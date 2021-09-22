<script>
    function clickMe() {
        const result ='<?= md5("abc", false) ?>'
        // const result ='<?= md5("abc", true) ?>'
        document.body.append(document.createElement('br'))
        document.body.append(result)
    }
</script>

<button onclick='clickMe()' >Button</button>