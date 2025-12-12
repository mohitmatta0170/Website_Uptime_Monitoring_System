
<?php
namespace App\Jobs;

use App\Models\Website;
use App\Mail\WebsiteDownMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CheckWebsiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $websiteId) {}

    public function handle() {
        $website = Website::with('client')->find($this->websiteId);
        if (!$website) return;

        $prev = $website->last_status;

        try {
            $res = Http::timeout(10)->get($website->url);
            $status = $res->successful() ? 'up' : 'down';
        } catch (\Throwable $e) {
            $status = 'down';
        }

        $website->update([
            'last_status'=>$status,
            'last_checked_at'=>now()
        ]);

        if ($status === 'down' && $prev !== 'down') {
            Mail::to($website->client->email)
                ->send(new WebsiteDownMail($website->url));
        }
    }
}
