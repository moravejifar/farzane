<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelperGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:generate {--nowrite : Do not write the file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'No-op stub for ide-helper:generate to avoid external log noise';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('ide-helper:generate stub executed (no-op)');
        return 0;
    }
}
