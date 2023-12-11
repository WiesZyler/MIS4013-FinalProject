<?php
$PageTitle = "Home";
include "Views/header.php";
?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Welcome to Magic: The Gathering</h1>
        <p>Your introductory text or description here.</p>
        <a href="card.php" class="btn btn-primary">View Cards</a>
        <a href="pack.php" class="btn btn-secondary">Explore Packs</a>
      </div>
    </div>

    <!-- Featured Cards Section -->
    <div class="row mt-4">
      <div class="col-md-12">
        <h2>Featured Cards</h2>
        <div class="card mb-3">
          <img src="img/BL.png" class="card-img-top" alt="Card Image">
          <div class="card-body">
            <h5 class="card-title">Black Lotus</h5>
            <p class="card-text">Adds 3 mana of any single color of your choice to your mana pool, then is discarded. Tapping this artifact can be played as an interrupt.</p>
            <a href="https://www.tcgplayer.com/product/8687/magic-beta-edition-black-lotus" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md-12">
        <h2>Latest News</h2>
       
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">How Do the December 2023 MTG Bans Impact Commander?</h5>
            <p class="card-text">We've just seen a fresh handful of bans across three formats: Pioneer, Modern, and Pauper. You might think that this has no impact on Magic's most popular format, but you may actually be surprised!</p>
            <a href="https://infinite.tcgplayer.com/article/How-Do-the-December-2023-MTG-Bans-Impact-Commander" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>
<?php
include "Views/footer.php";
?>
