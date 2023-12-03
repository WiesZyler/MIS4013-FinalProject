<?php

require_once("util-db.php");
require_once("Models/store.php");

$PageTitle = "Stores";
include "Views/header.php";

if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertStore($_POST['sname'],$_POST['slon'],$_POST['slat']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Store Added!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Store Not Added!", icon: "error",});
      </script>
        <?php
      }
      break;
      case  "Delete":
      if (deleteStore($_POST['sid']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Store Deleted!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        ?>
       <script>
         Swal.fire({title: "Error", text: "Store Not Deleted!", icon: "error",});
      </script>
        <?php
      }
        break;
       case  "Edit":
      if (editStore($_POST['sname'],$_POST['slon'],$_POST['slat']))
      {
        ?>
       <script>
         Swal.fire({title: "Success", text: "Store Edited!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Store Not Edited!", icon: "error",});
      </script>
        <?php
      }
      break;
    }

}

$stores = selectStore();
include "Views/Store/index.php";
include "Views/footer.php";

?>
