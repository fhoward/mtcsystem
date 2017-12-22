<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class Patient
 *
 * @package App
 * @property string $image
 * @property string $name
 * @property string $gender
 * @property string $birthday
 * @property string $guardians_name
 * @property string $contact_number
 * @property text $address
 * @property string $doctors_name
 * @property text $remarks
 * @property string $file
*/
class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = ['image', 'name', 'gender', 'birthday', 'guardians_name', 'contact_number', 'address', 'doctors_name', 'remarks', 'file'];
    
    public static function boot()
    {
        parent::boot();

        Patient::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBirthdayAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['birthday'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['birthday'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthdayAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function assigned_therapist()
    {
        return $this->belongsToMany(User::class, 'patient_user')->withTrashed();
        return $this->assigned_therapist()->get('user_id');
    }

    

//     public function get_staff_patients() {
//         // Get patient by staff id
//         return $this->assigned_therapist()->get('user_id');
//         if ($user->role_id == 1) {
//            $users = DB::table('patients')
           // ->join('patient_user', function ($join) {
           //  $join->on('patient_user.patient_id', '=', 'patients.id')
           //  ->where('patient_user.user_id','=', $this->users->id ) }) 

           //  ->get();

           //  ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
           //  $join->on('users.id', '=', 'contacts.user_id')
            
// // SELECT * FROM patients
// // JOIN patient_user ON patient_user.patient_id = patients.id
// // WHERE patient_user.user_id = 1


        
//     }
        
}
