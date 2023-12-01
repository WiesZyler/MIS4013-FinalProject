  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>


<div id="myModal" class="modal">
  <div class="modal-content">
   <span>Pack Information</span>
			<br />
      <input type="hidden" name="pid" id="pid">
			<div class="input-group">
				<label class="input-group-text">Pack Name</label>
				<input type="text" id="pname" class="form-control" />
			</div>
			<div class="input-group">
				<label class="input-group-text">Release Date</label>
				<input type="date" id="rdate" class="form-control" />
			</div>
  </div>
</div>

<script>
			var pid = document.querySelector("#pid");
			var pname = document.querySelector("#pname");
			var prdate = document.querySelector("#rdate");
</script>





<div id="tbl"></div>
<script>
function openModal() {
    const modal = document.getElementById('myModal');
    const modalContent = document.getElementById('modalContent');
    
    modal.style.display = 'block';
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

grid.on("rowClick", (row, index) => {
  pid.value = row.cells[0].data;
  pname.value = row.cells[1].data;
 const d = new Date(row.cells[2].data);
  prdate.value = d.toISOString().split('T')[0];
  openModal();
});
</script>
