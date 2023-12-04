<?php

require_once("util-db.php");
require_once("Models/card.php");

$PageTitle = "Cards";
include "Views/header.php";





if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertCard($_POST['cname'],$_POST['ccolorid'],$_POST['ccardtype'],$_POST['crarity'],$_POST['pid']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Card Added!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Card Not Added!", icon: "error",});
      </script>
        <?php
      }
      break;
      case  "Delete":
      if (deleteCard($_POST['cid']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Card Deleted!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        ?>
       <script>
         Swal.fire({title: "Error", text: "Card Not Deleted!", icon: "error",});
      </script>
        <?php
      }
        break;
       case  "Edit":
      if (editCard($_POST['cname'],$_POST['ccolorid'],$_POST['ccardtype'],$_POST['crarity'],$_POST['cid'],$_POST['pid']))
      {
        ?>
       <script>
         Swal.fire({title: "Success", text: "Card Edited!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Card Not Edited!", icon: "error",});
      </script>
        <?php
      }
      break;
    }

}







$cards = selectCard();
include "Views/Card/index.php";
include "Views/footer.php";

?>
