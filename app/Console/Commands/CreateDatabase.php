<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database';

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
     * @return int
     */
    public function handle()
    {
        if(rename('.env.example','.env')) {
            $dbName = $this->ask('Nom de la base de donnée ?');
            $conn = DB::connection('install');
            $conn->statement('CREATE DATABASE IF NOT EXISTS ' . $dbName . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
            $path = base_path('.env');
    
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    'DB_DATABASE='. env('DB_DATABASE'), 'DB_DATABASE='.$dbName, file_get_contents($path)
                ));
            }
        }
    }
}
