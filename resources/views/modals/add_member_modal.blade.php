<link href="/res/select2/css/select2.min.css" rel="stylesheet" />
<script src="/res/select2/js/select2.min.js"></script>

<form action="/member_add" method="post" class="global-submit">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="modal-header">
  <h5 class="modal-title">Add New Member</h5>
  
</div>
<div class="modal-body">
  <div class='row input-group'>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">First Name</span>
      </div>
      <input type="text" class="form-control" placeholder="First Name" name="first_name" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Middle Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-4">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Last Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Last Name" name="last_name" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-6">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Birth Date</span>
        </div>
        <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <div class="col-md-6">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contact Number</span>
        </div>
        <input type="number" class="form-control" placeholder="Contact Number" name="contact_number" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Address</span>
      </div>
      <textarea class="form-control" aria-label="Address" name="address" required></textarea>
    </div>
  </div>

  <div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Ministry</span>
      </div>
      <select class="js-example-basic-multiple" name="ministries[]" multiple="multiple" style="width: 100%">
        @foreach($ministries as $key => $ministry)
        <option value="{{$ministry->ministry_id}}">{{$ministry->ministry_name}}</option>
        @endforeach
      </select>
    </div>
  </div>
 
  
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Add Member</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>

<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>