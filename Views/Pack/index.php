  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>


<div id="myModal" class="modal">
  <div class="modal-content" style="width: 400px; display: flex; flex-direction: column; align-items: center;">
    <span style="font-size: 20px; font-weight: bold;">Pack Information</span>
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
    <form method="post" action="">
    <input type="hidden" name="actionType" id="actionType" value="">
    <div class="btn-group" style="margin-top: 5px; width: 200px; display: flex; justify-content: center;">
      <button class="btn btn-primary btn-sm" id="addbtn">Add</button>
      <button class="btn btn-warning btn-sm" id="editbtn">Edit</button>
      <button class="btn btn-danger btn-sm" id="deletebtn" onclick="return confirm('Are You Sure?');>Delete</button>
    </div>
    </form>
  </div>
</div>

			





<div id="tbl"></div>
<script>
var pid = document.querySelector("#pid");
var pname = document.querySelector("#pname");
var prdate = document.querySelector("#rdate");
var actionType = document.querySelector("#actiontype");

let addbtn = document.querySelector("#addbtn");
			addbtn.addEventListener("click", async () => {
				closeModal();
				actionType.value = "Add";

			})

let editbtn = document.querySelector("#editbtn");
			editbtn.addEventListener("click", async () => {
				closeModal();
                                actionType.value = "Edit";
			})

let deletebtn = document.querySelector("#deletebtn");
			deletebtn.addEventListener("click", async () => {
				closeModal();
                                actionType.value = "Delete";
			})

	
function openModal() {
    const modal = document.getElementById('myModal');  
    modal.style.display = 'block';
  }

function closeModal() {
  const modal = document.getElementById('myModal');
  modal.style.display = 'none';
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

grid.on("rowClick", (...args) => {
				pid.value = args[1]._cells[0].data;
				pname.value = args[1]._cells[1].data;
				prdate.value = args[1]._cells[2].data;

  let d = args[1]._cells[2].data;
d = new Date(d);
prdate.value = moment(d).format("yyyy-MM-DD")
  openModal();
});
</script>
