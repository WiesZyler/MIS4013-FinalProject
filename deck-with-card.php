<?php

require_once("util-db.php");
require_once("Models/deck-with-card.php");

$PageTitle = "Find a Card";
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
      if (deleteDeck($_POST['dcid']))
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
      if (editDeck($_POST['did'],$_POST['cid'],$_POST['quantity'],$_POST['dcid']))
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
$deckswithcards = selectDeckWithCard();
$cardswithdecks = selectDeckWithCard();
$decks = selectDeck();
$decksopt = selectDeck();
$cards = selectCard();
$cardsopt = selectCard();
include "Views/Deck-With-Card/index.php";
include "Views/footer.php";

?>
