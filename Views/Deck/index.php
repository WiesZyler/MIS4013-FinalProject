
  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
<div id="tb2"></div>
<script>
const grid = new gridjs.Grid({
  columns: ['Deck ID', 'Deck Name', 'Format', 'Player Name'],
  sort: true,
  pagination: true,
  data: [
    <?php 
    while ($deck = $decks->fetch_assoc()) {
      echo "['" . $deck['DeckID'] . "', '" . $deck['DName'] . "', '" . $deck['DFormat'] . "', '" . $deck['DPlayerName'] . "'],";
    }
    ?>
  ],
  style: {
    grid: {
      'background-color': '#1e1e1e',
      color: '#ddd',
      'font-family': 'Arial, sans-serif',
    },
    table: {
      border: '1px solid #2e2e2e',
    },
    th: {
      'background-color': '#2e2e2e',
      color: '#ddd',
      'border-bottom': '1px solid #2e2e2e',
      'text-align': 'center',
    },
    td: {
      'border-bottom': '1px solid #2e2e2e',
      'text-align': 'center',
    },
    pagination: {
      'background-color': '#2e2e2e',
      color: '#ddd',
    },
  }
});
  grid.render(tb2);
</script>
