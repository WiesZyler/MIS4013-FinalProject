<?php

require_once("util-db.php");
require_once("Models/deck.php");

$PageTitle = "Decks";
include "Views/header.php";


if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertDeck($_POST['dname'],$_POST['dformat'],$_POST['dplayername']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Deck Added!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Deck Not Added!", icon: "error",});
      </script>
        <?php
      }
      break;
      case  "Delete":
      if (deleteDeck($_POST['did']))
      {
         ?>
       <script>
         Swal.fire({title: "Success", text: "Deck Deleted!", icon: "success",});
      </script>
        <?php
          }
      else
      {
        ?>
       <script>
         Swal.fire({title: "Error", text: "Deck Not Deleted!", icon: "error",});
      </script>
        <?php
      }
        break;
       case  "Edit":
      if (editDeck($_POST['dname'],$_POST['dformat'],$_POST['dplayername'],$_POST['did']))
      {
        ?>
       <script>
         Swal.fire({title: "Success", text: "Deck Edited!", icon: "success",});
      </script>
        <?php
          }
      else
      {
         ?>
       <script>
         Swal.fire({title: "Error", text: "Deck Not Edited!", icon: "error",});
      </script>
        <?php
      }
      break;
    }

}


$decks = selectDeck();
include "Views/Deck/index.php";
include "Views/footer.php";

?>
