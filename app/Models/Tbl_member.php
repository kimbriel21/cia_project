<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_member extends Model
{
    protected $table = 'tbl_member';
    public $timestamps = false;
    protected $primaryKey = "member_id";
}