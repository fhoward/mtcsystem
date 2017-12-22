<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profession
 *
 * @package App
 * @property string $profession
*/
class Profession extends Model
{
    use SoftDeletes;

    protected $fillable = ['profession'];
    
    public static function boot()
    {
        parent::boot();

        Profession::observe(new \App\Observers\UserActionsObserver);
    }
    
}
