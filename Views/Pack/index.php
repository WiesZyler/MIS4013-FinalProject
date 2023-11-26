<div id="table"></div>
<script>
  {
    async function ShowTable()
      {
    let r = await fetch( '<?php selectPack ?>' );
    let rj = await r.json();
 
  
const grid = new Grid({
  data: rj
});
      }


  }


  
</script>
