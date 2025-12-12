
<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Website;
use App\Jobs\CheckWebsiteJob;

class MonitorWebsites extends Command
{
    protected $signature = 'monitor:websites';
    protected $description = 'Monitor websites';

    public function handle() {
        Website::chunkById(100, function ($sites) {
            foreach ($sites as $site) {
                dispatch(new CheckWebsiteJob($site->id));
            }
        });
    }
}
