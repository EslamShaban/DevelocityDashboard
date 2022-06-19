<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\View\Components\Notifications as NotificationComponent;

class NotificationController extends Controller
{
    
    public function notifications_ajax(Request $request){

        //$notifications = \Auth::user()->notifications()->limit(15)->get(); 
        if(auth('admin')->check()){
    
            $task_notifications = auth('admin')
                                    ->user()
                                    ->notifications()
                                    ->where('type', 'App\Notifications\TaskStatus')
                                    ->orderBy('created_at','DESC')->limit(50)->get();
            $req_notifications  = auth('admin')
                                    ->user()
                                    ->notifications()
                                    ->where('type', 'App\Notifications\AddRequirement')
                                    ->orderBy('created_at','DESC')->limit(50)->get();

    }else{
        
        $task_notifications = auth('admin-company')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\AddTask')
                                ->orderBy('created_at','DESC')->limit(50)->get();
        $req_notifications  = auth('admin-company')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\ChangStatusRequirement')
                                ->orderBy('created_at','DESC')->limit(50)->get();

    }

        $notifications_types  = array(
            'task_notifications'                   => (new NotificationComponent($task_notifications, null))->render(),
            'req_notifications'                    => (new NotificationComponent(null,$req_notifications))->render()

        );

        $not_response  = array(
            'response'                   => $notifications_types,
            //'count_unseen_notifications' => intval($notifications->whereNull('read_at')->count()),
        );
        $data = [
            'notifications' => [
                'response'        => $not_response,
                //'counter_session' => intval(session('seen_notifications')),
            ],
            'alert' => false,
        ];
/*
        if ($data['notifications']['counter_session'] < $not_response['count_unseen_notifications'])
            $data['alert'] = true; 
  
            session(['seen_notifications' => $not_response['count_unseen_notifications']]);*/
        return $data;
    }

}
