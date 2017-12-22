<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Schedule
 *
 * @package App
 * @property string $staff
 * @property string $patient
 * @property string $activity
 * @property string $status
 * @property string $date
 * @property time $start
 * @property time $end
*/
class Schedule extends Model
{
    use SoftDeletes;

    protected $fillable = ['activity', 'status', 'date', 'start', 'end', 'staff_id', 'patient_id'];
    
    public static function boot()
    {
        parent::boot();

        Schedule::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setStaffIdAttribute($input)
    {
        $this->attributes['staff_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPatientIdAttribute($input)
    {
        $this->attributes['patient_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }

        //  $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        // if ($input != $zeroDate && $input != null) {
        //     return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        // } else {
        //     return '';
        // }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['start'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['end'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['end'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }
    
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id')->withTrashed();
    }
    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id')->withTrashed();
    }
    
}
