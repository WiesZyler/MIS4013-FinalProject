  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>

<div id="tbl"></div>
<script>
const grid = new gridjs.Grid({
  columns: ['Pack ID', 'Pack Name', 'Release Date'],
  search: true,
  sort: true,
  pagination: true,
  data: [
    <?php 
    while ($pack = $packs->fetch_assoc()) {
      echo "['" . $pack['PackID'] . "', '" . $pack['PName'] . "', '" . $pack['PReleaseDate'] . "'],";
    }
    ?>
  ],
  style: {
    table: {
      border: '3px solid #ccc'
    },
    th: {
      'background-color': 'rgba(44,47,51,0.1)',
      color: '#99aab5',
      'border-bottom': '3px solid #ccc',
      'text-align': 'center'
    },
    td: {
       'background-color': 'rgba(44,47,51,0.1)',
      color: '#99aab5',
      'border-bottom': '3px solid #ccc',
      'text-align': 'center'
    }
  }
});
  grid.render(tbl);
</script>

