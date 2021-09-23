<?php
    ob_start();
    session_start();
?>

<?php
// include './test.php';

$html = file_get_contents('./index.html');
libxml_use_internal_errors(true);
$doc = new DOMDocument(); 
$doc->loadHTML($html);

$descBox = $doc->getElementById('header');

if (!isset($_SESSION['username'])) {
    include './login.php';
    include './register.php';

    $appended = $doc->createElement('button', 'Zarejestruj się');
    $appended->setAttribute('class', 'session-btn register');

    $descBox->appendChild($appended);

    $appended = $doc->createElement('button', 'Zaloguj się');
    $appended->setAttribute('class', 'session-btn login');

    $descBox->appendChild($appended);
} else {
    $appended = $doc->createElement('a', 'Wyloguj się');
    $appended->setAttribute('class', 'session-btn logout');
    $appended->setAttribute('href', './logout.php');

    $descBox->appendChild($appended);
}

echo $doc->saveHTML();
?>
