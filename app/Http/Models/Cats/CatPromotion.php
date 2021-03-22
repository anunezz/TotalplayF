<?php namespace App\Http\Models\Cats;
use App\Http\Models\Cats\CatNamePaks;
use App\Http\Models\Cats\CatPackFrontier;
use App\Http\Models\FilePromotionModal;
use App\Http\Models\ImgPromotion;
use Illuminate\Database\Eloquent\Model;

class CatPromotion extends Model
{
    protected $fillable = ['type','frontier','triple_double','name','color','description','isActive'];
    protected $with = ['namepack','imgpromotion','imgpromotionmodal','catFrontier','catTripleDoble'];

    public function namepack()
    {
        return $this->belongsTo(
            CatNamePaks::class,
            'type','id'
            //'type','id'
        );
    }

    public function catFrontier()
    {
        return $this->belongsTo( CatPackFrontier::class, 'frontier' ,'id' );
    }

    public function catTripleDoble()
    {
        return $this->belongsTo( CatTripleDoble::class, 'triple_double' ,'id' );
    }

    public function imgpromotion()
    {
        return $this->hasOne(
            ImgPromotion::class,
            'promotion_id','id'
        );
    }

    public function imgpromotionmodal()
    {
        return $this->hasOne(
            FilePromotionModal::class,
            'promotion_id','id'
        );
    }

    public function scopeFilter($query, $data)
    {
        return $query->where(function($q) use ($data){
            if($data['type'] === 1){
                $q->where("triple_double", ($data['typePack'] ? 1 : 2) );
            }

            $q->where("frontier", $data['city'] )->where('type',$data['type'])->where('isActive',1);
        });
    }

    public function scopeFilters($query, $data)
    {
        return $query->where(function($q) use ($data){
            //dd($data);
            if( count($data) > 1 ){
                if( $data['name'] !== null || $data['name'] !== '' ){
                    $name = $data['name'];
                    $q->where("name",'like',"%$name%");
                }
                if( count($data['frontiers']) === 1 ){
                    $q->whereIn("frontier",$data['frontiers']);
                }
                if( count($data['tripleDouble']) === 1 ){
                    $q->whereIn("triple_double ",$data['tripleDouble']);
                }
                if( count($data['types']) > 0 ){
                    $q->whereIn("type",$data['types']);
                }
                if( $data['name'] !== null || $data['name'] !== '' ){
                    $name = $data['name'];
                    $q->where("name",'like',"%$name%");
                }
            }

            $q->orderBy('updated_at', 'DESC');
        });
    }


}
