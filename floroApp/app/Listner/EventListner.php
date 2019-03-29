<?php

namespace App\Listner;

use App\Events\Add\Events\event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;



class EventListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  event  $event
     * @return void
     */
    public function handle(event $event)
    {
        $event->user->Last_login = date('Y-m-d H:i:s');
       $event->user->save();

//         $a=auth()->id();
// $user->find($a)->update([
// 'last_login_at' => Carbon::now()->toDateTimeString(),
// 'last_logout_at' => date('Y-m-d H:i:s'),
// 'last_login_ip' => $request->getClientIp(),
// 'http_user_agent' => $request->server('HTTP_USER_AGENT'),
// ]);

// AuthenticationLog::insert([
// 'user_id' => auth()->id(),
// 'ip_address' => $request->getClientIp(),
// 'login_time' => Carbon::now()->toDateTimeString(),
// 'logout_time' => date('Y-m-d H:i:s'),
// 'agent' => $request->server('HTTP_USER_AGENT'),
// ]);
    }
}
