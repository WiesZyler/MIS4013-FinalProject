
<script>
const grid = new Grid({
  columns: ['Pack ID', 'Pack Name', 'Release Date'],
  data: [
   <?php While($pack = $packs->fetch_assoc())
     {
     echo 
       "['".$Pack['PackID']."', '". $Pack['PName'] . "', '" . Pack['ReleaseDate']."'],"
    
       }
?>
  ]
});
</script>
