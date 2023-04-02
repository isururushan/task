<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Persons extends Model
{
   
    
    protected $table = 'persons';//access the database and table
    protected $guarded = [];

    public function persons()
    {
        return $this->belongsTo('App\Persons');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getAgeGroups()
    {
        return self::select(DB::raw('COUNT(*) as count'), DB::raw('FLOOR(age/10) as age'))
            ->groupBy('age')
            ->orderBy('age')
            ->get();
    }

    public static function getDobGroups()
    {
        return self::select(DB::raw('COUNT(*) as count'), DB::raw('YEAR(dob) as dob'))
            ->groupBy('dob')
            ->orderBy('dob')
            ->get();
    }

    public static function getReligionGroups()
    {
        return self::select(DB::raw('COUNT(*) as count'), 'religion')
            ->groupBy('religion')
            ->orderBy('religion')
            ->get();
    }

    

}
