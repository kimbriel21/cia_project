<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Member\ParentController;
use Illuminate\Http\Request;
use Redirect;

class DashboardController extends ParentController
{
	function dashboard()
	{
		return view('member.dashboard');
	}

	function sample_ajax()
	{
		$return['count_up'] = ['1', '2', '3', '4'];

		return json_encode($return);
	}
}