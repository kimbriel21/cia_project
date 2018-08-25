<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_member_ministry extends Model
{
    protected $table = 'tbl_member_ministry';
    public $timestamps = false;
    protected $primaryKey = "member_ministry_id";

    public function scopeJoinMemberMinistry($query, $member_id = 0, $ministry_id = 0)
    {
    	$query->join('tbl_member', 'tbl_member.member_id', '=', 'tbl_member_ministry.member_id');
    	$query->join('tbl_ministry', 'tbl_ministry.ministry_id', '=', 'tbl_member_ministry.ministry_id');
    	
    	if ($member_id != 0) 
    	{
    		$query->where('tbl_member.member_id', $member_id);
    	}

    	if ($ministry_id != 0) 
    	{
    		$query->where('tbl_ministry.ministry_id', $ministry_id);
    	}

    	return $query;
    }
}