<?php

require_once("util-db.php");
require_once("Models/store-with-pack.php");

$PageTitle = "Packs";
include "Views/header.php";

if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertPack($_POST['pname'],$_POST['rdate']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Added!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Pack Not Added!", icon: "error",});
      </script>
        <?php
      }
      break;
      case  "Delete":
      if (deletePack($_POST['pid']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Deleted!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        ?>
       <script>
         Swal.fire({title: "Error", text: "Pack Not Deleted!", icon: "error",});
      </script>
        <?php
      }
        break;
       case  "Edit":
      if (editPack($_POST['pname'],$_POST['rdate'],$_POST['pid']))
      {
        ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Edited!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Pack Not Edited!", icon: "error",});
      </script>
        <?php
      }
      break;
    }

}
$storeswithpacks = selectStoreWithPack();
$packs = selectPack();
$stores = selectStore();
include "Views/Store-With-Pack/index.php";
include "Views/footer.php";

?>
