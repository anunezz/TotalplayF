<?php  namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Cats\CatAttention;

class LevelsOfAttention extends Model
{
    protected $fillable = ['status_attention_id','no_account','isActive'];
    protected $with  = ['catAttention'];

    public function catAttention()
    {
        return $this->belongsTo(
            CatAttention::class,
            'status_attention_id'
        )->where( 'isActive', 1 );
    }

}
