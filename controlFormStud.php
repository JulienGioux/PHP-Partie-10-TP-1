<?php
setlocale(LC_TIME, 'french.UTF-8, fr-FR.UTF-8', 'fr.UTF-8', 'fra.UTF-8', 'fr_FR.UTF-8');
date_default_timezone_set('Europe/Paris');
define('REGEX_NAME', '/^[a-zA-Zéèêëiîïôöüäç\']{1,22}[ |-]?[a-zA-Zéèêëiîïôöüäç\']{1,22}$/');
define('REGEX_COUNTRYNAME', '/^[a-zA-Zéèêëiîïôöüäç\' -]{2,50}/');
define('REGEX_MAIL', '/(^[a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}$)/');
define('REGEX_TELFR', '/^[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}$/');
define('ARR_DEGREE', [
    'Sans',
    'Bac',
    'Bac+2',
    'Bac+3',
    'Bac+4 et plus'
]);
define('REGEX_ID_POLE_EMP', '/^[0-9]{7}[A-Z]{1}$/');
define('REGEX_NB_BADGE', '/[0-9]{1,2}/');
define('REGEX_URL_CODECADEMY', '/^https:\/\/codecademy.com\/.*$/');
define('REGEX_TXTAREA', '/(.|\n){50,250}/mu');

function testInput($varPost,$regex){
    
    if (!empty($varPost) && isset($varPost)) { 

        echo 'test: ' . grapheme_strlen($varPost) . '<br>';
        echo 'test2: ' . mb_strlen($varPost, "UTF-8") . '<br>';
        echo 'test2: ' . strlen($varPost) . '<br>';
        $testRegex = preg_match($regex, $varPost, $matches);     
        if ($testRegex == 1 && $matches[0] == $varPost) {
            var_dump($varPost,$matches);
            $testVarPost = [TRUE, $matches[0]];
        } else {
            $testVarPost = [FALSE, $varPost];
        }
    } else {
        $testVarPost = [FALSE, $varPost];
    }
    return $testVarPost;
    var_dump($testVarPost);
}

function testDegree($varPost) {
    $varPost = htmlspecialchars($varPost);
    if (!empty($varPost) && isset($varPost)) {
        if (in_array($varPost, ARR_DEGREE)){
            $testVarPost = [TRUE, $varPost];
        } else {
            $testVarPost = [FALSE, $varPost];
        }
    } else {
        $testVarPost = [FALSE, $varPost];
    }
    return $testVarPost;
}
function validateDate($date, $format = 'd-m-Y'){
    $date = htmlspecialchars($date);
    $d = DateTime::createFromFormat($format, $date);
    return [$d && $d->format($format) == $date, $date];
}
function testSelectedArr($arr, $value) {
    if (isset($arr) && !empty($arr)) {
        if ($arr[0] && $arr[1] == $value) {
            return 'selected';
        }
    }
}

if (isset($_POST) && !empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $testFormPosted = TRUE;
} else {
    $testFormPosted = FALSE;
}




$testfName = [];
$testlName = [];
$testDateOfBirth = [];
$testCountry = [];
$testNationality = [];
$testMail = [];
$testTel = [];
$testDegree = [];
$testIdPolEmp = [];
$testNbBadge = [];
$testHero = [];
$testLastHack = [];
$testUrlCodecademy = [];
$testFirstCode = [];




if ($testFormPosted) {
    $testfName = testInput($_POST['fName'], REGEX_NAME);
    $testlName = testInput($_POST['lName'], REGEX_NAME);
    $testDateOfBirth = validateDate($_POST['dOfB']);
    $testCountry = testInput($_POST['country'], REGEX_COUNTRYNAME);
    $testNationality = testInput($_POST['nationality'], REGEX_COUNTRYNAME);
    $testMail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $testMail = ($testMail == FALSE) ? [$testMail, htmlspecialchars($_POST['email'])] : [TRUE, $testMail];
    $testTel = testInput($_POST['tel'], REGEX_TELFR);
    $testDegree = (isset($_POST['degree'])) ? testdegree($_POST['degree']) : testdegree('');
    $testIdPolEmp = testInput($_POST['idPoleEmploi'], REGEX_ID_POLE_EMP);
    $testNbBadge = testInput($_POST['numBadge'], REGEX_NB_BADGE);
    $testHero = testInput($_POST['wwHero'], REGEX_TXTAREA);
    $testLastHack = testInput($_POST['lastHack'], REGEX_TXTAREA);
    var_dump($testLastHack);
    $testUrlCodecademy = (filter_var($_POST['urlCodedademy'], FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED))? testInput($_POST['urlCodedademy'], REGEX_URL_CODECADEMY) : [FALSE, htmlspecialchars($_POST['urlCodedademy'])];
    if (isset($_POST['firstCode'])) {
        if (empty($_POST['firstCode'])) {
            $testFirstCode = [FALSE, NULL];
        }
        if ($_POST['firstCode'] === 'on') {
            $testFirstCode = [TRUE, 'on'];
        }
    } else {
        $testFirstCode = [FALSE, NULL];
    }
}

try {
    $dbh = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'g=xXiG#V');
    $stmt = $dbh->prepare("INSERT INTO `test` (`txtarea`) VALUES (:value)");
    $stmt->bindParam(':value', $value);

    // insertion d'une ligne

    $value = $testHero[1];
    $stmt->execute();
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
}
