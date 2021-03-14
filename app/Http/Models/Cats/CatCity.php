<?php  namespace App\Http\Models\Cats;

use App\Http\Models\Cats\CatState;
use App\Http\Models\Cats\CatPackFrontier;
use Illuminate\Database\Eloquent\Model;

class CatCity extends Model
{
    protected $with = ['catFrontier'];

    public function state()
    {
        return $this->belongsTo(CatState::class);
    }

    public function catFrontier()
    {
        return $this->belongsTo( CatPackFrontier::class, 'frontier' ,'id' );
    }
}
