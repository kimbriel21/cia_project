<form action="/ministry_add" method="post" class="global-submit">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="modal-header">
  <h5 class="modal-title">Add New Ministry</h5>
  
</div>
<div class="modal-body">

    <div class="row">
      <div class="col-md-8">
        Ministry Name
      </div>
      <div class="col-md-4">
        Action
      </div>
    </div>
    <div class="multiple-ministry">
      <div class="row multiple-ministry-input-0" ministyInputID="0" style="margin-bottom: 5px;">
        <div class="col-md-8">
          <div class="input-group" style="width: 100%;">
            <input type="text" class="form-control"  placeholder="Ministry Name" name="ministry[]">
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
              <button type="button" class="btn btn-success add-input-ministry"><b>+</b></button>
              <!-- <button type="button" class="btn btn-danger"><b>-</b></button> -->
          </div>
        </div>        
      </div>
    </div>

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Add Ministry</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>

<script type="text/javascript">
  
  var ministry_modal = new ministry_modal();
  
  function ministry_modal()
  {
    init();

    var count_num = 0;
    function init()
    {
      $(document).ready(function() 
      {
        click_add_input_ministry();
      });
    }
    
    function click_add_input_ministry()
    {
      $('.add-input-ministry').unbind('click');
      $('.add-input-ministry').bind('click', function(event) 
      {
        count_num++;
        add_input_ministry();
      });

    }

    function add_input_ministry()
    {
      $('.multiple-ministry').append('<div class="row row-'+count_num+' multiple-ministry-input" style="margin-bottom: 5px;"><div class="col-md-8"><div class="input-group" style="width: 100%;"><input type="text" class="form-control"  placeholder="Ministry Name" name="ministry[]"></div></div><div class="col-md-4"><div class="row"><button type="button" class="btn btn-success add-input-ministry"><b>+</b></button> <button type="button" class="btn btn-danger remove-input-ministry" ministyInputID="'+count_num+'" style="margin-left : 2px;"><b>x</b></button></div></div></div>');
      click_add_input_ministry();
      remove_input_ministry();
    }

    function remove_input_ministry()
    {
       $('.remove-input-ministry').unbind('click');
       $('.remove-input-ministry').bind('click', function(event)
       {
         var row_remove =  "row-"+$(this).attr('ministyInputID'); 
         $("."+row_remove).remove();
       });
    }
  }
  
</script>