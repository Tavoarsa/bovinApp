<?php

namespace BovinApp\Console\Commands;

use Illuminate\Console\Command;

use BovinApp\Event;
use BovinApp\User;
use App;
use Auth;
use PDF;
use Carbon\Carbon;

class Email_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:email_list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()  {


         $users = \DB::table('users')
            ->join('events', 'idUser', '=', 'users.id')          
            ->select('users.id','users.name','users.email','events.end_time','events.title')
            ->get();dd($users);

        foreach ($users as  $user) 
        {               
                                          
               

                Mail::send('email.user', ['user' => $user->name], function ($m) use ($user) {
                    
                    $events=\DB::table('events')
                                ->where('idUser',$user->id)                            
                                ->get();
                     $pdf= PDF::loadView('report.event',['events'=>$events]);
                    $m->from('notificaciones@bovinapp.com', 'BovinApp.com');
                    $m->to($user->email, $user->name)->subject('Eventos Pendientes');                                       
                    $m->attach($pdf);
                });

          
        }
        
                     
    }
}



                                    
                       
                     
         
                        
                        
                        



                         

                   
                
               

