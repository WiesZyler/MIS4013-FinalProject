<?php
$PageTitle = "Home";
include "Views/header.php";
?>
  <div class="container mt-4" style="color: white;">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Welcome to Magic: The Gathering</h1>
        <p>all the knowledge you need to start playing!</p>
        <a href="card.php" class="btn btn-primary">View Cards</a>
        <a href="pack.php" class="btn btn-secondary">Explore Packs</a>
      </div>
    </div>

    <!-- Featured Cards Section -->
   <div class="row mt-4">
  <h2 style="color: white;">Featured Cards</h2>
  <div class="col-lg-6">
    <div class="card mb-3 d-flex flex-row" style="background-image:linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%); color: white; border-style:solid; border-color: #0d1c49;">
      <img src="img/BL.png" class="card-img-top" alt="Black Lotus" style="width: 200px; border-radius:4%">
      <div class="card-body" style="max-width: calc(100% - 200px);">
        <h5 class="card-title">Black Lotus</h5>
        <p class="card-text">Adds 3 mana of any single color of your choice to your mana pool, then is discarded. Tapping this artifact can be played as an interrupt.</p>
        <a href="https://www.tcgplayer.com/product/8687/magic-beta-edition-black-lotus" class="btn btn-primary">View Details</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-3 d-flex flex-row" style="background-image:linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%); color: white; border-style: solid; border-color: #0d1c49;">
      <img src="img/GS.png" class="card-img-top" alt="Gishath, Sun's Avatar" style="width: 200px; border-radius:4%">
      <div class="card-body" style="max-width: calc(100% - 200px);">
        <h5 class="card-title">Gishath, Sun's Avatar</h5>
        <p class="card-text">Trample, vigilance, haste. Whenever Gishath, Sun's Avatar deals combat damage to a player, reveal that many cards from the top of your library. Put any number of Dinosaur creature cards from among them onto the battlefield and the rest on the bottom of your library in a random order.</p>
        <a href="https://www.tcgplayer.com/product/8687/magic-beta-edition-black-lotus" class="btn btn-primary">View Details</a>
      </div>
    </div>
  </div>
</div>




    <div class="row mt-4">
      <div class="col-md-12">
        <h2 style="color: white;">Latest News</h2>
       
        <div class="card mb-3" style="background-image:linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%); color: white; border-style:solid; border-color: #0d1c49;">
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
