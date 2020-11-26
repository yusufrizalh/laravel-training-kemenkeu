<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    protected $signature = 'refresh:database';

    protected $description = 'Command untuk menyegarkan seluruh isi database dan seed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('migrate:refresh');

        $this->call('db:seed'); 

        $this->line('Command ini dijalankan');
    }
}
