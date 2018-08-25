<?php
namespace App\Http\Controllers\Ministry;

use App\Http\Controllers\Member\ParentController;
use Illuminate\Http\Request;
use App\Models\Tbl_member;
use App\Models\Tbl_ministry;
use App\Models\Tbl_member_ministry;
use Redirect;

class MinistryController extends ParentController
{
	function index()
	{
		return view('ministry.ministries');
	}

	function ministy_load_table()
	{
		$data['ministries'] = Tbl_ministry::paginate(10);
		return view('ministry.ministry_load_table', $data);
	}

	function add_ministry_modal()
	{
		return view('modals.add_ministry_modal');
	}

	function ministry_add(Request $request)
	{
		$ministries = $request->ministry;
		foreach ($ministries as $key => $ministry) 
		{
			$data['ministry_name'] = $ministry;
			Tbl_ministry::insert($data);
		}
		
		$return['call_function'] = "ministy_load_table";
		$return['status']		 = "success";

		return json_encode($return);
	}

	function view_ministry_member($ministry_id)
	{
		$data['ministry'] = Tbl_ministry::where('ministry_id', $ministry_id)->first();
		$data['ministry_members'] = Tbl_member_ministry::JoinMemberMinistry(0,$ministry_id)->get();

		return view('modals.view_ministry_member', $data);
	}

	function ministry_update(Request $request)
	{
		$ministry_id = $request->ministry_id;

		$data['ministry_name'] = $request->ministry_name;

		Tbl_ministry::where('ministry_id', $ministry_id)->update($data);
		
		$return['call_function'] = "ministy_load_table";
		$return['status']		 = "success";

		return json_encode($return);
	}

	function ministry_delete(Request $request)
	{
		$ministry_id = $request->ministry_id;
		Tbl_ministry::where('ministry_id', $ministry_id)->delete();

		$return['status']		 = "success";
		$return['message']		 = "ministry successfully deleted";

		return json_encode($return);
	}

	function remove_ministry_member(Request $request)
	{
		$ministry_id 	= $request->ministry_id;
		$member_id		= $request->member_id;

		Tbl_member_ministry::where('member_id', $member_id)->where('ministry_id', $ministry_id)->delete();

		$return['status']	= "success";
		$return['message']	= "member removed to this ministry";

		return json_encode($return);
	}

}