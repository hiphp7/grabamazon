<?php

namespace App\Models\Amazons;

use Illuminate\Database\Eloquent\Model;

class AmazonProductFocus extends Model
{
    protected $table = 'amazon_product_focus';
    public $timestamps=false;
    protected $guarded = [];
    public function category()
    {
        return $this->hasOne('App\Models\Amazons\AmazonOkCategory','id','catalog_id');
    }

    /**
     * 取n天前的数据
     * @param $query
     * @param int $days
     * @return mixed
     */
    public function scopeBeforeDays($query,$days=1){
        $update_time = date('Y-m-d H:i:s',strtotime("-$days days"));
        return $query->where('update_time','<',$update_time)->orderBy('rand()');
    }

    /**
     * 取随机数据
     * @param $query
     * @return mixed
     */
    public function scopeRand($query){
        return $query->orderBy(DB::raw('RAND()'));
    }
    public function scopeStep($query,$value=1){
        return $query->where('step','=',$value);
    }
    public function resetAllUnActive(){
        DB::table($this->table)->update('is_active',0);
    }
}
