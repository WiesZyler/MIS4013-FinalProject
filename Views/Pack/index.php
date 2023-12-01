  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>


<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <!-- Content to display in the modal -->
    <p id="modalContent"></p>
  </div>
</div>





<div id="tbl"></div>
<script>
function openModal(content) {
    const modal = document.getElementById('myModal');
    const modalContent = document.getElementById('modalContent');
    
    modal.style.display = 'block';
    modalContent.innerHTML = content;
  }

const grid = new gridjs.Grid({
  columns: ['Pack ID', 'Pack Name', 'Release Date'],
  sort: true,
  pagination: {limit:10},
  data: [
    <?php 
    while ($pack = $packs->fetch_assoc()) {
      echo "['" . $pack['PackID'] . "', '" . $pack['PName'] . "', '" . $pack['PReleaseDate'] . "'],";
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
  grid.render(tbl);

 grid.on('rowClick', (row, index) => {
    const rowData = row.cells.map(cell => cell.data);

    // You can modify this to create any HTML content you want to display in the modal
    const content = `
      <h2>Row Clicked</h2>
      <p><strong>Pack ID:</strong> ${rowData[0]}</p>
      <p><strong>Pack Name:</strong> ${rowData[1]}</p>
      <p><strong>Release Date:</strong> ${rowData[2]}</p>
    `;

    // Open the modal with the generated content
    openModal(content);
  });

  // Close the modal when the close button is clicked
  const closeBtn = document.getElementsByClassName('close')[0];
  closeBtn.onclick = function() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
  }

  // Close the modal when clicking outside the modal content
  window.onclick = function(event) {
    const modal = document.getElementById('myModal');
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }
</script>
