<?php
require_once("util-db.php");
require_once("model/pack.php");

$PageTitle = "Packs";
include "views/header.php";

$packs = selectPack();
include "views/pack/index.php";
include "views/footer.php";
?>
