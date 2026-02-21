    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" id="closeModel" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card" >
                <img src="" class="card-img-top" style="height: 223px !important;width:250px !important;"  id="pimage">

                </div>
            </div>
            <div class="col-md-5">
                <ul class="list-group text-left" style="">
                <li class="list-group-item">Price: XAF <strong id="pprice"></strong></li>
                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white"></span>
                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white"></span></li>
                </ul>
            </div>
            <div class="col-md-3">
    
                <div class="form-group" id="colorArea">
                <label for="exampleFormControlSelect1">Choose color</label>
                <select id="pcolor" name="pcolor" style="width: 90%;">
                <option>1</option>
                </select>
                </div>
                <div class="form-group" id="sizeArea">
                <label for="exampleFormControlSelect1">Choose size</label>
                <select id="psize" name="psize" style="width: 90%;">
                <option>1</option>
                </select>
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Quantity</label>

                <input type="hidden" id="product_id">
                <input type="number" class="" id="qty" name="qty" value="1" min="1" style="width: 90%;border:.5px black solid !important;">
                </div>
                <button type="submit" class="btn btn-primary" style="font-size: 14px" onclick="addToCarts()">Add to cart</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>