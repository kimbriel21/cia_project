<form action="/ministry_update" method="post" class="global-submit">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="ministry_id" value="{{$ministry->ministry_id}}">
<div class="modal-header">
  <h5 class="modal-title">Add New Ministry</h5>
  
</div>
<div class="modal-body">

    <div class="row" style="margin-bottom: 5px;">
      <div class="col-md-8">
        <b>Ministry Name</b>
      </div>
    </div>
    <div class="multiple-ministry">
      <div class="row multiple-ministry-input-0" ministyInputID="0" style="margin-bottom: 5px;">
        <div class="col-md-8">
          <div class="input-group" style="width: 100%;">
            <input type="text" class="form-control"  placeholder="Ministry Name" name="ministry_name" value="{{$ministry->ministry_name}}">
          </div>
        </div>       
      </div>
    </div>
    <div class="row" style="margin-bottom: 5px;">
      <div class="col-md-12">
       <b> Ministry Members</b>
      </div>
    </div>
     @foreach($ministry_members as $key => $ministry_member)
    <div class="row" member-id="{{$ministry_member->member_id}}" ministry-id="{{$ministry_member->ministry_id}}" style="margin-bottom: 5px;">  
      <div class="col-md-8">
        {{$ministry_member->first_name}} {{$ministry_member->middle_name}} {{$ministry_member->last_name}}
      </div>
      <div class="col-md-4">
        <button type="button" class="btn-remove-member"><i class="fa fa-remove fa-fw"></i></button>
      </div>
      
    </div>
    @endforeach

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-success btn-add-member">Add Member</button>
  <button type="submit" class="btn btn-primary">Update Ministry</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>



<script type="text/javascript">
  $(document).ready(function() 
  {
    onClickRemove();
    onClickAddMember();
  });

  function onClickRemove()
  {
    $('.btn-remove-member').unbind('click');
    $('.btn-remove-member').bind('click', function(event)
      {
          var row_dom     = $(this).closest('.row');
          var member_id   = $(this).closest('.row').attr('member-id');
          var ministry_id = $(this).closest('.row').attr('ministry-id');
          swal({
            title: "Are you sure?",
            text: "Do you re really want to remove this member?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                headers: 
                {
                        'X-CSRF-TOKEN': $('meta[name="my-csrf-token"]').attr('content')
                },
                url: '/remove_ministry_member',
                type: 'post',
                dataType: 'json',
                data: {'member_id' : member_id, 'ministry_id' : ministry_id},
                success: function(data)
                {
                  $(row_dom).remove();
                  swal(data.message, 
                  {
                    icon: "success",
                  });
                }
              });
              
            }
          });
      });
  }
  function onClickAddMember()
  {
    $('.btn-add-member').unbind('click');
    $('.btn-add-member').bind('click', function(event)
      {
        
      });
  }
</script>