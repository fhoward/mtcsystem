<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @package App
 * @property string $avatar
 * @property string $emp_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $confirm_password
 * @property string $rfid_no
 * @property string $role
 * @property string $remember_token
 * @property string $gender
 * @property string $contact_no
 * @property string $profession
 * @property string $prc_number
 * @property string $sss_id
 * @property string $tin_no
 * @property string $philhealth_id
 * @property string $guardian_name
 * @property string $guardian_contact_no
 * @property text $guardian_address
*/
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ['avatar', 'emp_id', 'name', 'email', 'password', 'confirm_password', 'rfid_no', 'remember_token', 'gender', 'contact_no', 'prc_number', 'sss_id', 'tin_no', 'philhealth_id', 'guardian_name', 'guardian_contact_no', 'guardian_address', 'role_id', 'profession_id'];
    
    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProfessionIdAttribute($input)
    {
        $this->attributes['profession_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id')->withTrashed();
    }
    
    
    
}
