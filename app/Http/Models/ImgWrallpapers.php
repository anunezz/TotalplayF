<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Cats\CatWallpaper;

//modelaje de cualquier tipo de imagenmenos fondo
class ImgWrallpapers extends Model
{
    protected $fillable = [
        'cat_wrallpaper_id',
        'fileName',
        'fileNameHash',
        'url',
        'isUrl',
        'isActive'];

    protected $with = ['catTypeWrallpaper'];

    public function catTypeWrallpaper()
    {
        return $this->belongsTo(
            CatWallpaper::class,
            'cat_wrallpaper_id','id'
        )->where( 'isActive', 1 );
    }

}
