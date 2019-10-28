<?php
/**
 * validate user and passwd.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace App\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

/**
 * Class UserAuthService.
 */
class UserAuthService implements UserProvider
{

    /**
     * user model.
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     * constructor.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        //
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        //
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        //
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        // $user = User::where(['wechat_id' => $credentials['open_id']])->first();
        // if (empty($user)) {
        //     $user = User::create([
        //         'wechat_id' => $credentials['open_id'],
        //         'last_login_time' => time(),
        //         'last_session_key' => $credentials['last_session_key'],
        //     ]);
        // } else {
        //     $user->fill([
        //         'last_login_time' => time(),
        //         'last_session_key' => $credentials['last_session_key'],
        //     ]);
        //     $user->save();
        // }
        // $this->user = $user;
        $user = [
            'name' => 'admin',
            'passwd' => 'admin',
        ];
        return $user;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // if ($user->wechat_id == $credentials['open_id']) {
        //     return true;
        // }
        // return false;
        return true;
    }

}
