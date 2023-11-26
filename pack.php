<?php

require_once("util-db.php");
require_once("Models/pack.php");

$PageTitle = "Packs";
include "Views/header.php";

$packs = selectPack();
include "Views/Pack/index.php";
include "Views/footer.php";

?>
