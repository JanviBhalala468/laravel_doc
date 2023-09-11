<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class product extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public $table = "damo";
    public function addDate($days)
    {
        $current = Carbon::create($this->mfd);
        $this->ex_date = $current->addDays($days);
    }
}