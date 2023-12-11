  <!-- Data table -->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>

<!-- Filter DropDowns -->
 <div id="myFilter" class="input-group">
 <label class="input-group-text">Option</label>
   <select class="form-select" aria-label="Option" id="option">
		  <option selected>Select A Option</option>
		  <option value="1" id="opt1">Search Store</option>
		  <option value="2" id="opt2">Find A Pack</option>
     </select>
    <select class="form-select" aria-label="Pack Name" id="packOpt">
		  <option selected>Select A Pack</option>
		   <?php // PHP loop to collect data from database
    while ($packopt = $packsopt->fetch_assoc()) {
    echo '<option value="' . $packopt['PackID'] . '">' . $packopt['PName'] . '</option>';
}
    ?>
     </select>
      <select class="form-select" aria-label="Store Name" id="storeOpt">
	      <?php
		while ($storeopt = $storesopt->fetch_assoc()) {
    echo '<option value="' . $storeopt['StoreID'] . '">' . $storeopt['SName'] . '</option>';
}

?>
     </select>
</div>


<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content" style="width: 400px; display: flex; flex-direction: column; align-items: center;">  	  
   <button id="closeModalBtn" class="btn btn-sm" style="position: absolute; top: 5px; right: 5px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
      </svg>
    </button>
    <span style="font-size: 20px; font-weight: bold;"></p>Pack Information</span>
    <form method="post" action="">
    <input type="hidden" name="pid" id="pid">
    <div class="input-group">
      <label class="input-group-text">Pack Name</label>
      <input type="text" id="pname" name="pname" class="form-control" />
    </div>
    <div class="input-group">
      <label class="input-group-text">Release Date</label>
      <input type="date" id="rdate" name="rdate" class="form-control" />
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
<div id="tbl"></div>


<!-- Javascript -->
<script>
// assigning variables\
var grid = null;
var pid = document.querySelector("#pid");
var pname = document.querySelector("#pname");
var prdate = document.querySelector("#rdate");
var actionType = document.querySelector("#actionType");
var optionDropdown = document.querySelector("#option");
var packDropdown = document.querySelector("#packOpt");
var storeDropdown = document.querySelector("#storeOpt");

// event listeners for modal buttons
let addbtn = document.querySelector("#addbtn");
			addbtn.addEventListener("click", async () => {
				closeModal();
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

function toggleDropdowns() {
    var selectedOption = optionDropdown.value;


    packDropdown.style.display = "none";
    storeDropdown.style.display = "none";

   
    if (selectedOption === "1") {
        storeDropdown.style.display = "block";
    } else if (selectedOption === "2") {
        packDropdown.style.display = "block";
    }
}


packDropdown.style.display = "none";
storeDropdown.style.display = "none";
optionDropdown.addEventListener("change", toggleDropdowns);
toggleDropdowns();
	
packDropdown.addEventListener("change", () => {
if (grid != null)
{
	grid.destroy();
}
let tbl = document.querySelector("#tbl")
	tbl.innerHTML = "";
ShowTable()
});
storeDropdown.addEventListener("change", () => {
if (grid != null)
{
	grid.destroy();
}
let tbl = document.querySelector("#tbl")
	tbl.innerHTML = "";
ShowTable()
});
<?php
$tableData = [];
while ($pack = $storeswithpacks->fetch_assoc()) {
    $tableData[] = [
        $pack['PackID'],
        $pack['StoreID'],
        $pack['SName'],
        $pack['PSPrice']
    ];
}
?>
var tableData = await <?php echo json_encode($tableData); ?>;
console.log(tableData);	
function ShowTable(){


	
var IDToFind = packDropdown.value;
var foundRows = tableData.filter(function(row) {
    return row[0] === IDToFind; 
});
console.log(foundRows);

	
// Table creation
grid = new gridjs.Grid({
  columns: ['Pack ID', 'Store ID', 'Store Name', 'Price'],
  sort: true,
  pagination: {limit:10},
  data: tableData,
  style: {
	table: {
	     'background-image': 'linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%)',
              border: '3px solid #0d1c49'
               },
        th: {
	      'background-image': 'linear-gradient(#17082e 0%, #1a0933 0%, #1a0933 1%, #0c1f4c 100%)',
      
	      color: 'white',
	      'text-shadow': '2px 2px 2px rgba(50, 251, 226, 0.3)',
	      'border-color': '#0d1c49',
	      'text-align': 'center'
   	    },
       td: {
		'background-image': 'linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%)',
		color: 'white',
		'border-color': '#0d1c49',
		'text-shadow': '2px 2px 2px rgba(50, 251, 226, 0.8)',
      		'text-align': 'center',
		'background-color': 'rgba(0, 0, 99, 0.1)',
    },
     footer:{
		'background-image': 'linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%)',
		color: 'white',
		'border-color': '#0d1c49',
      		'text-align': 'center',
		'background-color': 'rgba(0, 0, 99, 0.1)',
    },
	  pagination:{
		'background-image': 'linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%)',
		color: 'white',
		'border-color': '#0d1c49',
      		'text-align': 'center',
		'background-color': 'rgba(0, 0, 99, 0.1)',
    },
	}
});
  grid.render(tbl); // display the table in its container div

// detect clicks on table rows to open modal and and autofill information
grid.on("rowClick", (...args) => { 
				pid.value = args[1]._cells[0].data;
				pname.value = args[1]._cells[1].data;
				prdate.value = args[1]._cells[2].data;

  let d = args[1]._cells[2].data;
d = new Date(d); // convert date format
prdate.value = moment(d).format("yyyy-MM-DD")
  openModal();
});
}
</script>
