<?php
define("REGEX_NAME", "/^[a-zA-Zéèêëiîïôöüäç']{1,22}[ |-]?[a-zA-Zéèêëiîïôöüäç']{1,22}$/");
define("REGEX_COUNTRYNAME", "/^[a-zA-Zéèêëiîïôöüäç' -]{2,50}$/");
define("REGEX_MAIL", "/(^[a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}$)/");
define("REGEX_TELFR", "/^[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}$/");
define("ARR_DEGREE", [
    'Sans',
    'Bac',
    'Bac+2',
    'Bac+3',
    'Bac+4 et plus'
]);
define("REGEX_ID_POLE_EMP", "/^[0-9]{7}[A-Z]{1}$/");
define("REGEX_NB_BADGE", "/^[0-9]{1,2}$/");
define("REGEX_URL_CODECADEMY", "/^https:\/\/codecademy.com\/.*$/");

var_dump($_POST);




?>