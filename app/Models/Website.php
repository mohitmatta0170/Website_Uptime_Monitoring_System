
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','url','last_status','last_checked_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
