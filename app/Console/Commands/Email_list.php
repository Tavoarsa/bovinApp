<?php

namespace BovinApp\Console\Commands;

use Illuminate\Console\Command;

use BovinApp\Event;
use BovinApp\User;
use App;
use Auth;
use PDF;
use Carbon\Carbon;
use Schema;

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


       /* Schema::table('badamecums', function ($table) {
         $table->dropColumn('price');
     });*/

     Schema::table('vaccines', function ($table) {
        $table->double('cost')->nullable();
        });
     Schema::table('injecctions', function ($table) {
        $table->double('cost')->nullable();
        });

    Schema::table('aliments', function ($table) {
        $table->double('cost')->nullable();
        });


        
                     
    }
}


           
         
                        
                        
                        



                         

                   
                
               

