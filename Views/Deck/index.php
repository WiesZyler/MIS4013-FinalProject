
  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>

<button id="externalAddBtn" class="btn btn-primary">Add Deck</button>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content" style="width: 400px; display: flex; flex-direction: column; align-items: center;">  	  
   <button id="closeModalBtn" class="btn btn-sm" style="position: absolute; top: 5px; right: 5px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
      </svg>
    </button>
	  

    <span style="font-size: 20px; font-weight: bold;"></p>Deck Information</span>
    <form method="post" action="">
    <input type="hidden" name="did" id="did">
    <div class="input-group">
      <label class="input-group-text">Deck Name</label>
      <input type="text" id="dname" name="dname" class="form-control" />
    </div>
    <div class="input-group">
      <label class="input-group-text">Format</label>
      <input type="text" id="dformat" name="dformat" class="form-control" />
    </div>

   <div class="input-group">
      <label class="input-group-text">Player Name</label>
      <input type="text" id="dplayername" name="dplayername" class="form-control" />
    </div>


      
    
    <input type="hidden" name="actionType" id="actionType" value="">
    <div class="btn-group" style="margin-top: 5px; width: 200px; display: flex; justify-content: center;">
      <button class="btn btn-primary btn-sm" id="addbtn">Add</button>
      <button class="btn btn-warning btn-sm" id="editbtn">Edit</button>
      <button class="btn btn-danger btn-sm" id="deletebtn" onclick="return confirm('Are You Sure?');">Delete</button>
    </div>
    </form>
  </div>
</div>

<!-- Table -->
<div id="tb2"></div>


<!-- Javascript -->
<script>
// assigning variables
var did = document.querySelector("#did");
var dname = document.querySelector("#dname");
var dformat = document.querySelector("#dformat");
var dplayername = document.querySelector("#dplayername");
var actionType = document.querySelector("#actionType");





let externalAddBtn = document.querySelector("#externalAddBtn");
externalAddBtn.addEventListener("click", async () => {

    actionType.value = "Add";
	console.log(actionType.value);


	dname.value = '';
    dformat.value = '';
    dplayername.value = '';

  	openModal();

	
})



	
// event listeners for modal buttons
let addbtn = document.querySelector("#addbtn");
			addbtn.addEventListener("click", async () => {
				CloseModal();
				actionType.value = "Add";
				console.log(actionType.value);

			})

let editbtn = document.querySelector("#editbtn");
			editbtn.addEventListener("click", async () => {
				closeModal();
                                actionType.value = "Edit";
				console.log(actionType.value);
			})

let deletebtn = document.querySelector("#deletebtn");
			deletebtn.addEventListener("click", async () => {
				closeModal();
                                actionType.value = "Delete";
				console.log(actionType.value);
			})
let closeModalBtn = document.querySelector("#closeModalBtn");
closeModalBtn.addEventListener('click',async () => {closeModal();});

// functions to show and hide modal	
function openModal() {
    const modal = document.getElementById('myModal');  
    modal.style.display = 'block';
  }

function closeModal() {
  const modal = document.getElementById('myModal');
  modal.style.display = 'none';
}



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
	
// detect clicks on table rows to open modal and and autofill information
grid.on("rowClick", (...args) => { 
				did.value = args[1]._cells[0].data;
				dname.value = args[1]._cells[1].data;
				dformat.value = args[1]._cells[2].data;
				dplayername.value = args[1]._cells[3].data;

  let d = args[1]._cells[2].data;

  openModal();
});
</script>
