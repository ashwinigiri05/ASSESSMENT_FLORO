<?php

namespace App\Exports;
use App\UserActivity;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use DB;

class UsersExport implements FromCollection
{
    public function __construct(UserActivity $userActivity)
        {
        $this->userActivity = $userActivity;
        }
    
    public function collection()
    {
       $user = DB::table('users')
            
            ->join(
                'user_activities',
                'user_activities.user_id','=','users.id'
            )
            ->get();
           // dd($user);
     return $user;
 
    }
}
