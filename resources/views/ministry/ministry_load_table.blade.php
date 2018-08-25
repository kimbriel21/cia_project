<table class="table table-bordered table-ministries">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ministry Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($ministries as $key => $ministry)
  	<tr ministry-id="{{$ministry->ministry_id}}" class="ministry-id-{{$ministry->ministry_id}}">
  		<td>{{$ministry->ministry_id}}</td>
  		<td>{{$ministry->ministry_name}}</td>
  		<td>
  			<div class="w3-dropdown-hover">
  			  <button class="w3-button w3-blue">Action</button>
  			  <div class="w3-dropdown-content w3-bar-block w3-border">
  			    <button class="w3-bar-item w3-button dropdown-item view-member global-modal" url='/view_ministry_member/{{$ministry->ministry_id}}'>View</button>
  			    <button class="w3-bar-item w3-button delete-ministry">Delete</button>
  			  </div>
  			</div>
  		</td>
  	</tr>
  	@endforeach
  </tbody>
</table>

<div class="row">
  <div class="col-md-12">
    {{$ministries->links()}}
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    paginate_click();
  });

  function paginate_click()
  {
    $(document).on('click', 'a' ,function(e)
    {
      var is_pagination = $(this).parent('li').parent('ul').hasClass('pagination');
      if (is_pagination == true) 
      {
        e.preventDefault();
        var _url = $(e.currentTarget).attr('href');
        $('.table-ministries').load(_url);
      }
    });
  }
</script>