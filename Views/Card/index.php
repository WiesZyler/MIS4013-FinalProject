
  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
<div id="tb3"></div>
<script>
const grid = new gridjs.Grid({
  columns: ['Card ID', 'Card Name', 'Card Color', 'Card Type', 'Card Rarity'],
  sort: true,
  pagination: true,
  data: [
    <?php 
    while ($card = $cards->fetch_assoc()) {
      echo "['" . $card['CardID'] . "', '" . $card['CName'] . "', '" . $card['CColorID'] . "', '" . $card['CCardType'] . "'],'" . $card['CRarity'] . "'],";
    }
    ?>
const grid = new gridjs.Grid({
  columns: ['Card ID', 'Card Name', 'Card Color', 'Card Type', 'Card Rarity'],
  sort: true,
  pagination: true,
  data: [
    
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
  function applyDarkMode() {
  const darkStyles = {
    grid: {
      'background-color': '#111', // Darker background color
      color: '#eee', // Lighter text color
    },
    table: {
      border: '1px solid #333', // Darker border color
    },
    th: {
      'background-color': '#333', // Darker header background color
      color: '#eee', // Lighter header text color
    },
    td: {
      'border-bottom': '1px solid #333', // Darker border color for cells
    },
    pagination: {
      'background-color': '#333', // Darker pagination background color
      color: '#eee', // Lighter pagination text color
    },
  };

  grid.updateConfig({ style: darkStyles }).forceRender();
}

// Call applyDarkMode() to apply the dark mode styles
applyDarkMode();
  grid.render(tb3);
</script>
