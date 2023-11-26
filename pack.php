<?php
require_once("util-db.php");
require_once("model/pack.php");

$PageTitle = "Packs";
include "view/header.php";

$packs = selectPack();
include "view/pack/page.php";
include "view/footer.php";
?>
