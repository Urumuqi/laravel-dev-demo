<?php
/**
 * user controller.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace App\Http\Controllers;

use App\Exceptions\BusinessException;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login']]);
    }

    /**
     * login.
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return array
     */
    public function login(Request $req)
    {
        $filter = ['username' => 'string|required', 'passwd' => 'string|required'];
        $input = array_intersect_key($req->all(), $filter);
        $token = auth('api')->attempt([
            'username' => $input['username'],
            'passwd' => $input['passwd'],
        ]);
        if (!$token) {
            throw new \Exception('token signed failed');
        }

        $resp = [
            'token' => $token,
            'token_type' => 'Bearer',
        ];
        throw new BusinessException('this is business exception', '1234');

        return $this->jsonSuccess($resp);
    }
}
