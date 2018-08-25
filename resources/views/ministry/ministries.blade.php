@extends('member.layout_member')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ministries</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row mb-2">
	<div class="d-flex justify-content-center">
		<button type="button" class="btn btn-primary global-modal" url="/add_ministry_modal"><p class="fa fa-home"> Add Ministry </p></button>
	</div>
</div>
<div class="row table-ministries" style="margin-top: 20px;">
	
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		ministy_load_table();
	});

	function ministy_load_table()
	{
		$.ajax({
			url: '/ministy_load_table',
			type: 'GET',
			dataType: 'html',
			data: {},
			success : function(data)
			{
				$('.table-ministries').html(data);
			}
		})
		.done(function() {
			delete_ministry();
		});
		
	}

	function delete_ministry()
	{
		$('.delete-ministry').click(function(e) 
		{
			var ministry_id = $(this).closest('tr').attr('ministry-id');
			var tr_data = $(this).closest('tr');

			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to see the data of this Ministry!",
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
			    	url: '/ministry_delete',
			    	type: 'POST',
			    	data: {ministry_id: ministry_id},
			    	dataType: 'json',
			    	success: function(data)
			    	{
			    		if (data.status == "success") 
			    		{
			    			$(tr_data).remove();
			    			swal("Ministry Deleted!", data.message, "success");
			    		}
			    	}
			    });
			  }
			});
		});
	}
</script>
@endsection