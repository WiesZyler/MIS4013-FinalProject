<?php

require_once("util-db.php");
require_once("Models/deck.php");

$PageTitle = "Decks";
include "Views/header.php";

$decks = selectPack();
include "Views/Deck/index.php";
include "Views/footer.php";

?>
