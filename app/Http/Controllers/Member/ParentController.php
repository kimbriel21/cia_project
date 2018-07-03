<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Globals\Authenticator;
use Redirect;

class ParentController extends Controller
{
	public $member_info;
	function __construct()
	{
		$this->middleware(function ($request, $next)
		{
			$member = Authenticator::checkLogin();

			if(!$member)
			{
				return redirect("/login");
			}
			else
			{
				$this->member = $member;
				$this->member_info = $member;
				view()->share("session_member", $member);
			}

			return $next($request);
		});
	}
}