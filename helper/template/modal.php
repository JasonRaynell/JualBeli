  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?= $row["type"] ?></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="helper/action/doUpdate.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label col-sm-2" for="brand">Brand:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="brand" name="txtBrand" placeholder="Enter Brand" value="<?= $row["brand"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="type">Type:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="type" name="txtType" placeholder="Enter Type" value="<?= $row["type"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="price">Price:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="txtPrice" placeholder="Enter Price" value="<?= $row["price"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image">Image:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="txtImage" placeholder="Enter Brand">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
