
  
  <!-- location edit modal -->
  <div class="modal fade" id="location_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('update-location')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="location_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Location Name</label>
                    <input type="text" id="location_name" name="location_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- sub location edit modal -->
  <div class="modal fade" id="sub_location_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Sub Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('update-sub-location')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="sub_location_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Sub Location Name</label>
                    <input type="text" id="sub_location_name" name="sub_location_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Category edit modal -->
  <div class="modal fade" id="category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('update-category')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="category_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" id="category_name" name="category_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- sub category edit modal -->
  <div class="modal fade" id="sub_category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('update-sub-category')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="sub_category_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Sub Category Name</label>
                    <input type="text" id="sub_category_name" name="sub_category_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<!-- Manual Deposit Modal -->
  @foreach ($payment_methods as $item)
  <div class="modal fade" id="manual_deposit_modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <img style="max-height: 50px;border-radius:50%" src="{{URL::to($item->payment_logo)}}" alt="">
            <strong>{{$item->payment_name}}</strong>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('save-deposit')}}" method="post">
            @csrf
            <input type="hidden" name="payment_method_id" value="{{$item->id}}">
            <div class="modal-body">
                <div class="form-group">
                  <label  for="account_one{{$item->id}}">Account</label>
                  <div class="input-group mb-2">
                    <input type="text"  class="form-control" readonly id="account_one{{$item->id}}" value="{{$item->account_no_one}}"  placeholder="Account">
                    <div class="input-group-prepend">
                      <div class="input-group-text copy-text" style="background: #fff;" data-clipboard-target="#account_one{{$item->id}}" ><i class="fas fa-copy"></i></div>
                    </div>
                  </div>
                </div>
                @if($item->account_no_two)
                <div class="form-group">
                  <label  for="account_two{{$item->id}}">Account</label>
                  <div class="input-group mb-2">
                    <input type="text"  class="form-control" readonly id="account_two{{$item->id}}" value="{{$item->account_no_two}}"  placeholder="Account">
                    <div class="input-group-prepend">
                      <div  class="input-group-text copy-text"  style="background: #fff;" data-clipboard-target="#account_two{{$item->id}}"><i class="fas fa-copy"></i></div>
                    </div>
                  </div>
                </div>
                @endif
                @if($item->account_no_three != NULL)
                <div class="form-group">
                  <label for="account_three{{$item->id}}">Account</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" readonly id="account_three{{$item->id}}" value="{{$item->account_no_three}}" placeholder="Account">
                    <div class="input-group-prepend">
                      <div class="input-group-text copy-text"  style="background: #fff;" data-clipboard-target="#account_three{{$item->id}}"><i class="fas fa-copy"></i></div>
                    </div>
                  </div>
                </div>
                @endif
                <div class="form-group">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <input type="number" name="amount" class="form-control"   placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                    </div>
                    <input type="text" class="form-control" name="transction_id"  placeholder="Your Transction ID">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="width: 100%">Place Deposit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  

  <!-- make single satisfy -->
  <div class="modal fade" id="satisfy_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate This Prove</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('save-satisfy')}}" method="post">
          @csrf
          <input type="hidden" name="my_work_id" id="my_work_id" value="">
          <div class="modal-body">
            <p>Rate Now</p>
            <div class="form-group">
              <div class="rate" style="width: 100%">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
            </div>
            <div></div>
            <div class="form-group">
              <a href="javascript:void(0)" class="btn btn-info give_tips_button">Give Tips</a>
            </div>
            <div class="form-group d-none" id="tips_amount">
              <label for="">Amount</label>
              <input type="text" name="tips_amount" class="form-control">
            </div>
            <div class="card p-2 mt-2">
              <h4>Submitted Prove</h2>
              <p id="work_proof"></p>
            </div>
            <div class="text-center">
              <div id="modal_append">
                
              </div>
              <div class="form-group">
                <div class="area-list">
                  <div class="area-item-div">
                    <input type="radio" name="status" class="d-none" id="Satisfy" required data-id="1" value="1" >
                    <label for="Satisfy" class="area-item">Satisfy</label>
                  </div>
                  <div class="area-item-div area-item-div-danger">
                    <input type="radio" name="status" class="d-none" id="UnSatisfy" required data-id="2" value="2" >
                    <label for="UnSatisfy" class="area-item">UnSatisfy</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Submit" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
