<form action="/update_member" method="post"  class="global-submit">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="member_id" value="{{$member->member_id}}">
<div class="modal-header">
  <h5 class="modal-title">Add New Member</h5>
  
</div>
<div class="modal-body">
  <div class='row input-group'>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">First Name</span>
      </div>
      <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$member->first_name}}" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Middle Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{$member->middle_name}}" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Last Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{$member->last_name}}" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-6">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Birth Date</span>
        </div>
        <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" value="{{$member->birthday}}" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-6">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contact Number</span>
        </div>
        <input type="number" class="form-control" placeholder="Contact Number" name="contact_number" value="{{$member->number}}" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Address</span>
      </div>
      <textarea class="form-control" aria-label="Address" name="address" required>{{$member->address}}</textarea>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Update</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>

