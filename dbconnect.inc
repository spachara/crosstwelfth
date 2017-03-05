<?php
    require_once "site-private.inc.php";
    require_once "store_procedure.inc";
    require_once "misc.inc";
function show_error() {
    die("Error " . mysql_errno() . " : " . mysql_error());
}

?>
