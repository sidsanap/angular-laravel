<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class userData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add user data to database';

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
    public function handle(){
       
        // $file = public_path('user_data.csv');
        // $delimiter = ',';       
        //     if(!file_exists($file) || !is_readable($file))
        //         return false;

        //     $header = null;
        //     $data = array();

        //     if (($handle = fopen($file,'r')) !== false){
        //         while (($row = fgetcsv($handle, 1000, $delimiter)) !==false){
        //             if (!$header)
        //                 $header = $row;
        //             else
        //                 $data[] = array_combine($header, $row);
        //         }
        //         fclose($handle);
        //     }

            $data = [

                     'name'  =>'vishal',
                     'email'=>'vishal+1@gmail.com',
                     'password'=>123456

                  ];

            $meta_descArr = $data;

             User::Create($meta_descArr);

            // for ($i = 0; $i < count($meta_descArr); $i ++){

            //     // print_r($meta_descArr);exit();
               
            // }

           // print_r(error_reporting(0));
            echo "Users data added"."\n";

    }
}