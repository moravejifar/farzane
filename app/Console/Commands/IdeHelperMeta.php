<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelperMeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:meta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'No-op stub for ide-helper:meta to avoid external log noise';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('ide-helper:meta stub executed (no-op)');
        return 0;
    }
}
