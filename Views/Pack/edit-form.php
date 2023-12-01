<div class="modal fade" id="newPackModal<?php echo $pack['packID'];?>" tabindex="-1" aria-labelledby="newPackModalLabel<?php echo $pack['packID'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newPackModalLabel<?php echo $pack['packID'];?>">Edit a Pack</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                  <form method="post" action="">

                    <div class="mb-3">
                      <label for="pName<?php echo $pack['packID'];?>" class="form-label">Pack Name</label>
                      <input type="text" class="form-control" id="pName<?php echo $pack['packID'];?>" name="pName" value="<?php echo $pack['packname'];?>">
                    </div>

                    <div class="mb-3">
                      <label for="rDate<?php echo $pack['packID'];?>" class="form-label">Release Date</label>
                      <input type="text" class="form-control" id="rDate<?php echo $pack['packID'];?>" name="rDate" value="<?php echo $pack['releasedate'];?>">
                    </div>
                    <input type="hidden" name="pID" value="<?php echo $pack['packID'];?>">
                    
                 
                    <input type="hidden" name="actionType" value="Edit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

        
      </div>
    </div>
  </div>
</div>
