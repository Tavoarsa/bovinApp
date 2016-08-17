<?php

namespace BovinApp\Console\Commands;

use Illuminate\Console\Command;
use PDF;
use BovinApp\Event;
use BovinApp\User;
use Mail;
use Session;

class Event_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create event list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
           
       
         $users = User::all();


        foreach ($users as  $user) 
        { 
           Session::put('email',$user->email);

           $events=\DB::table('events')
                                ->where('idUser',$user->id)                            
                                ->get();                                           
               

                Mail::send('email.user',['events'=>$events] , function ($m)  {

                   
                 

                    
                    $m->from('notificaciones@bovinapp.com', 'BovinApp.com');
                    $m->to(Session::get('email'))->subject('Eventos Pendientes');                                       
                    
                });

          
        }
    }
}
