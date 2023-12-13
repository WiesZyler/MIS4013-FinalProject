<?php

require_once("util-db.php");
require_once("Models/deck-with-card.php");

$PageTitle = "Find a Deck";
include "Views/header.php";

if (isset($_POST['actionType']))
{
  switch ($_POST['actionType'])
    {
      case  "Add":
      if (insertDeck($_POST['did'],$_POST['cid'],$_POST['quantity']))
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
      if (deleteDeck($_POST['dcid']))
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
      if (editDeck($_POST['did'],$_POST['cid'],$_POST['quantity'],$_POST['dcid']))
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
$deckswithcards = selectDeckWithCard();
$cardswithdecks = selectDeckWithCard();
$decks = selectDeck();
$decksopt = selectDeck();
$cards = selectCard();
$cardsopt = selectCard();
include "Views/Deck-With-Card/index.php";
include "Views/footer.php";

?>
