<?php

namespace BovinApp\Console\Commands;

use Illuminate\Console\Command;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un mensaje de Cumpleaños Feliz a los usuarios por SMS';

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
         User::whereBirthDate(date('m/d'))->get(); 

        foreach( $users as $user )
         {
            if($user->has('cellphone')) 
            {
                SMS::to($user->cellphone)
                ->msg('Querido ' . $user->fname . ', te deseo un feliz cumpleaños')
                ->send();
            }   
        } 

        $this->info('Los mensajes de felicitacion han sido enviados correctamente');
    }
}
