<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:data {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display User Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if($this->argument('id')){
            $user=User::whereId($this->argument('id'))->get(['id', 'name', 'email']);
            if(count($user)>0){
                $this->table(['id', 'name', 'email'], $user);
            }else{
                $this->error('User Not Found!');
            }
        }else{
            $user=User::get(['id', 'name', 'email']);
            $this->table(['id', 'name', 'email'], $user);
            $this->info('Hello World this is user data!');
        }
    }
}
