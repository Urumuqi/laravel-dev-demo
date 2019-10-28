<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 25 May 2019 10:20:14 +0000.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class TUser
 *
 * @property int $id
 * @property string $uuid
 * @property int $gender
 * @property int $birthday
 * @property string $phone
 * @property string $province
 * @property string $city
 * @property string $area
 * @property string $wechat_id
 * @property string $wechat_account
 * @property string $nickname
 * @property string $user_icon
 * @property int $auth_status
 * @property string $real_name
 * @property string $jobs
 * @property int $marital_status
 * @property string $self_desc
 * @property int $create_time
 * @property int $update_time
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject
{

    use Notifiable;

    // authorize
    const AUTHORIZED = 1;
    const UN_AUTHORIZE = 0;

    // gender
    const MALE = 0;
    const FEMALE = 1;

    /**
     * table name 't_users'.
     *
     * @var string
     */
    protected $table = 't_users';

    public $timestamps = true;

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    /**
     * 获取当前时间戳
     *
     * @return int
     */
    public function freshTimestamp() {
        return time();
    }

    /**
     * 获取时间戳格式时间.
     *
     * @return string
     */
    public function getDateFormat() {
        return 'U';
    }

    /**
     * 避免时间戳转化为字符串.
     *
     * @param mixed $value
     *
     * @return void
     */
    public function fromDateTime($value) {
        return $value;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            // 'last_login_time' => $this->last_login_time,
            // 'nickname' => $this->nickname,
            // 'gender' => $this->gender,
            // 'avatar' => $this->user_icon,
            // 'user_id' => $this->id,
            // 'session_key' => $this->last_session_key,
        ];
    }

    protected $casts = [
        // 'gender' => 'int',
        // 'birthday' => 'int',
        // 'auth_status' => 'int',
        // 'marital_status' => 'int',
        // 'create_time' => 'int',
        // 'update_time' => 'int'
    ];

    protected $fillable = [
        // 'id',
        // 'uuid',
        // 'gender',
        // 'birthday',
        // 'phone',
        // 'country',
        // 'language',
        // 'province',
        // 'city',
        // 'area',
        // 'wechat_id',
        // 'wechat_account',
        // 'nickname',
        // 'user_icon',
        // 'avatar',
        // 'auth_status',
        // 'real_name',
        // 'jobs',
        // 'marital_status',
        // 'self_desc',
        // 'hobby',
        // 'personality',
        // 'create_time',
        // 'update_time',
        // 'last_login_time',
        // 'last_session_key',
    ];
}
