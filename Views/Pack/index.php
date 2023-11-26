<div id="table"></div>
<script>
  {
    var grid = null;
    var g;
    async function ShowTable()
      {
let tbl = document.querySelector("#table");
        tbl.innerHTML = "";
    let r = await fetch( '<?php selectPack() ?>', { method: "post", cache: "no-store"} );
    let rj = await r.json();

    let params = {
      data: rj,
      search: true,
      sort: true,
      width: 800,
      pagination: {limit: 10,},
    };
 
  
grid = new gridjs.Grid(params);
    grid.render(tbl);

        
      }
ShowTable();
  }

         
       

  
  
</script>
