<?php
    ob_start();
    session_start();
?>

<?php
include './post.php';

$html = file_get_contents('./index.html');
libxml_use_internal_errors(true);
$doc = new DOMDocument(); 
$doc->loadHTML($html);

$sessBtnCont = $doc->getElementById('sess-btn-cont');

if (isset($_SESSION['valid']) && $_SESSION['valid']) {
    $btn = $doc->createElement('button', 'Wyloguj się');
    $btn->setAttribute('class', 'session-btn logout');

    $sessBtnCont->appendChild($btn);
} else {
    include './login.php';
    include './register.php';

    $btn = $doc->createElement('button', 'Zarejestruj się');
    $btn->setAttribute('class', 'session-btn register');

    $sessBtnCont->appendChild($btn);

    $btn = $doc->createElement('button', 'Zaloguj się');
    $btn->setAttribute('class', 'session-btn login');

    $sessBtnCont->appendChild($btn);
}

echo $doc->saveHTML();
?>
