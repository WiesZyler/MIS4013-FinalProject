<?php

require_once("util-db.php");
require_once("Models/card.php");

$PageTitle = "Cards";
include "Views/header.php";

$cards = selectCard();
include "Views/Card/index.php";
include "Views/footer.php";

?>
