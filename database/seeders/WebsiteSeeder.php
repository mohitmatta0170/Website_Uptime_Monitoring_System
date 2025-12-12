
<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;
use App\Models\Client;

class WebsiteSeeder extends Seeder
{
    public function run() {
        $clients = Client::all();
        Website::create(['client_id'=>$clients[0]->id,'url'=>'https://example.com']);
        Website::create(['client_id'=>$clients[1]->id,'url'=>'https://laravel.com']);
    }
}
