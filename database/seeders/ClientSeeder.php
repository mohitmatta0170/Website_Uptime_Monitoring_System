
<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run() {
        Client::create(['email'=>'client1@example.com']);
        Client::create(['email'=>'client2@example.com']);
    }
}
