
<?php
namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        return Client::select('id','email')->get();
    }

    public function websites(Client $client) {
        return $client->websites()->select('id','url')->get();
    }
}
