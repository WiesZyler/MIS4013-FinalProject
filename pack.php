<?php

require_once("util-db.php");
require_once("Models/pack.php");

$PageTitle = "Packs";
include "Views/header.php";

if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertPack($_POST['pname'],$_POST['rdate']))
      {
       echo '<div class="alert alert-success" role="alert"> Pack Added! </div>';
         ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Added!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        echo '<div class="alert alert-danger" role="alert"> Error! Pack Not Added! </div>';
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
       echo '<div class="alert alert-success" role="alert"> Pack Deleted</div>';
         ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Deleted!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        echo '<div class="alert alert-danger" role="alert"> Error! Pack Not Deleted! </div>';
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
       echo '<div class="alert alert-success" role="alert"> Pack Edited! </div>';
        ?>
       <script>
         Swal.fire({title: "Success", text: "Pack Edited!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        echo '<div class="alert alert-danger" role="alert"> Error! Pack Not Edited! </div>';
         ?>
       <script>
         Swal.fire({title: "Error", text: "Pack Not Edited!", icon: "error",});
      </script>
        <?php
      }
      break;
    }

}

$packs = selectPack();
include "Views/Pack/index.php";
include "Views/footer.php";

?>
