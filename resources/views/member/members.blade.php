@extends('member.layout_member')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Member List</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row mb-2">
	<div class="d-flex justify-content-center">
		<button type="button" class="btn btn-primary global-modal" url="/add_member_modal"><p class="fa fa-user"> Add Member </p></button>
	</div>
</div>

<div class="row table-members" style="margin-top: 20px;">
	
</div>

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() 
	{
		member_load_table();
	});

	function member_load_table()
	{
		$.ajax(
		{
			url: '/member_load_table',
			type: 'get',
			dataType: 'html',
			data: {},
			success : function(data)
			{
				$('.table-members').html(data);	
			},
		}).done(function() {
			delete_member();
		});
	}

	function delete_member()
	{
		$('.delete-member').click(function(e) 
		{
			var member_id = $(this).closest('tr').attr('member-id');
			var tr_data = $(this).closest('tr');

			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to see the data of this member!",
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
			    	url: '/member_delete',
			    	type: 'POST',
			    	data: {member_id: member_id},
			    	dataType: 'json',
			    	success: function(data)
			    	{
			    		if (data.status == "success") 
			    		{
			    			$(tr_data).remove();
			    			swal("Member Deleted!", data.message, "success");
			    		}
			    	}
			    });
			  }
			});
		});
	}

	function update_member_row(data)
	{
	  update_row_html(data.member)
	}


	function update_row_html(data)
	{
	  var _html = '<th scope="row">'+data.member_id+'</th><td>'+data.first_name+'</td><td>'+data.middle_name+'</td><td>'+data.last_name+'</td><td>'+data.birthday+'</td><td>'+data.number+'</td><td>'+data.address+'</td><td class="text-center"><div class="w3-dropdown-hover"><button class="w3-button w3-blue">Action</button><div class="w3-dropdown-content w3-bar-block w3-border"><button class="w3-bar-item w3-button dropdown-item view-member global-modal" url="/view_member_modal/'+data.member_id+'">View</button><button class="w3-bar-item w3-button delete-member" >Delete</button></div></div></td>'
	  $('.member-id-'+data.member_id).html(_html);
	}

</script>
@endsection