<?php

namespace BovinApp\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use BovinApp\User;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email of event to a user';

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
        
     /*\DB::table('users')
            ->where('id', 1)
            ->update(['last_name' => 'TE AMO']);*/
             $users = User::all();//dd($user);
             

             foreach ($users as $user)
            {
                

               Mail::send('email.user', ['user' => $user->name], function ($m) use ($user) {
                    $m->from('notificaciones@bovinapp.com', 'BovinApp.com');

                    $m->to($user->email, $user->name)->subject('Eventos Pendientes');
                    $path ='public/pdf/';                    
                    $m->attach($path.$user->id.'.pdf');
                });
                        
            }
    }

    
}
