<?php

require_once("util-db.php");
require_once("Models/store.php");

$PageTitle = "Stores";
include "Views/header.php";

$stores = selectStore();
include "Views/Store/index.php";
include "Views/footer.php";

?>
