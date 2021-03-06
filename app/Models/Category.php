<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Translatable\HasTranslations;

class Category extends Model
{
	use SoftDeletes;
	// use HasTranslations;

    protected $fillable  	= ['name_en', 'name_ar', 'type', 'parent_id', 'image', 'delivery_fees', 'sort'];
    protected $hidden 	 	= ['created_at', 'updated_at', 'deleted_at'];
        // public    $translatable = ['name'];
    public function getImageAttribute()
    {
        $image = \App\Helpers\Helper::getImage($this->attributes['image']);
        return $image;
    }

    public function children()
	{
	    return $this->hasMany('App\Models\Category', 'parent_id');
	}

	public function parent()
	{
	    return $this->belongsTo(Category::class,'parent_id');
	}

	public function getTypeAttribute()
	{
		$type = $this->attributes['type'];

		if($type == 1){
			return trans('site.ecommerce');
		} elseif($type == 2){
			return trans('site.contractors');
		} elseif($type == 3){
			return trans('site.heavy_trucks');
		}
	}

	public function getLocaleName()
	{
		$lang = \Lang::getLocale();
		if($lang == 'ar'){
			return $this->name_ar;
		}
		return $this->name_en;
	}
}
