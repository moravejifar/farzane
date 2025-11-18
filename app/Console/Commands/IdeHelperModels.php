<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelperModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:models {--write=false} {--dir=} {--nowrite : Do not write files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'No-op stub for ide-helper:models to avoid external log noise';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('ide-helper:models stub executed (no-op)');
        return 0;
    }
}
