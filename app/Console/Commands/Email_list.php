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
            ->select('users.id')
            ->get();//dd($users);

          $date=Carbon::today();

          $date=explode(' ', $date);

          //$date= $date->toDateTimeString();

         // dd($date);

           
          foreach ($users as  $user) {
       

          $events=\DB::table('events')
                            ->where('idUser',$user->id)                            
                            ->get();

                     // dd($events);

                              



          $pdf= PDF::loadView('report.event',['events'=>$events]);
          $path ='public/pdf/';            
          $pdf->save($path.$user->id.'.pdf');
              
          }
        
                     
    }
}



                                    
                       
                     
         
                        
                        
                        



                         

                   
                
               

