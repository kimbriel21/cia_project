<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Member\ParentController;
use Illuminate\Http\Request;
use App\Models\Tbl_member;
use App\Models\Tbl_ministry;
use App\Models\Tbl_member_ministry;
use Redirect;

class MemberController extends ParentController
{
	function index()
	{
		$data['members'] = Tbl_member::get();

		return view('member.members',$data);
	}

	function member_load_table()
	{
		$data['members'] = Tbl_member::paginate(15);
		return view('member.member_load_table', $data);
	}

	function add_member_modal()
	{
		$data['ministries'] = Tbl_ministry::get();
		return view('modals.add_member_modal', $data);
	}

	function member_add(Request $request)
	{
		$insert['first_name'] 	= $request->first_name;
		$insert['middle_name'] 	= $request->middle_name;
		$insert['last_name'] 	= $request->last_name;
		$insert['birthday'] 	= $request->birth_date;
		$insert['number'] 		= $request->contact_number;
		$insert['address'] 		= $request->address;

		$member_id 				= Tbl_member::insertGetId($insert);

		foreach ($request->ministries as $key => $ministry) 
		{
			$insert_ministry['member_id'] = $member_id;
			$insert_ministry['ministry_id'] = $ministry;
			Tbl_member_ministry::insert($insert_ministry);
		}

		$return['call_function'] = "member_load_table";
		$return['status']		 = "success";
		$return['message']		 = "successfully added member!";

		return json_encode($return);
	}

	function view_member_modal($member_id)
	{

		$data['member'] 			= Tbl_member::where('member_id', $member_id)->first();
		$data['ministries'] 		= Tbl_ministry::get();
		$data['member_ministry']	= collect(Tbl_member_ministry::where('member_id', $member_id)->pluck('ministry_id'))->toArray();
		
		return view('modals.view_member_modal', $data);
	}

	function member_delete(Request $request)
	{
		$member_id = $request->member_id;

		Tbl_member::where('member_id', $member_id)->delete();

		$return['status']		 = "success";
		$return['message']		 = "successfully deleted member!";

		return json_encode($return);
	}

	function update_member(Request $request)
	{
		$member_id  = $request->member_id;
		$ministries = $request->ministries;

		$update['first_name'] 	= $request->first_name;
		$update['middle_name'] 	= $request->middle_name;
		$update['last_name'] 	= $request->last_name;
		$update['birthday'] 	= $request->birth_date;
		$update['number'] 		= $request->contact_number;
		$update['address'] 		= $request->address;

		Tbl_member::where('member_id', $member_id)->update($update);
		$update['member_id']	 = $member_id;

		Tbl_member_ministry::where('member_id', $member_id)->delete();

		foreach ($ministries as $key => $ministry) 
		{
			$insert_ministry['member_id'] = $member_id;
			$insert_ministry['ministry_id'] = $ministry;
			Tbl_member_ministry::insert($insert_ministry);
		}

		$return['status']		 = "success";
		$return['call_function'] = "update_member_row";
		$return['message']		 = "successfully updated member!";
		$return['member_id']	 = $member_id;
		$return['member']		 = $update;

		return json_encode($return);
	}

	function sample_ajax()
	{
		$return['count_up'] = ['1', '2', '3', '4'];
		return json_encode($return);
	}
}