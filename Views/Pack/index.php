<script>
const grid = new Grid({
  columns: ['Pack ID', 'Pack Name', 'Release Date'],
  data: [
    <?php 
    while ($pack = $packs->fetch_assoc()) {
      echo "['" . $pack['PackID'] . "', '" . $pack['PName'] . "', '" . $pack['PReleaseDate'] . "'],";
    }
    ?>
  ]
});
</script>

