<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * jwt payload.
     *
     * @var array
     */
    public $payload;

    /**
     * current login user parse by jwt.
     *
     * @var App\Models\User
     */
    public $user;

    /**
     * constructor.
     *
     * 如果不需要，可以在构造函数中重写构造函数.
     */
    public function __construct()
    {
        $this->middleware('jwt.verify');
        $payload = auth('api')->parseToken()->getPayload();
        $currentUser = User::find($payload['user_id']);
        if (!!!$currentUser) {
            throw new ApiException('token is illegal', 401);
        }
        $this->payload = $payload;
        $this->user = $currentUser;
    }

    /**
     * return json formate success.
     *
     * @param mixed  $data
     * @param string $msg
     */
    public function jsonSuccess($data, $msg = 'success')
    {
        $this->parseNull($data);

        return response()->json([
            'code' => 0,
            'msg' => $msg,
            'data' => $data,
        ]);
    }

    /**
     * return json formate error.
     *
     * @param integer $code
     * @param string  $data
     * @param string  $msg
     */
    public function jsonError($code, $data = '', $msg = 'failed')
    {
        return response()->json([
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        ]);
    }

    /**
     * parse null to ""
     *
     * @param mixed $data
     */
    private function parseNull(&$data)
    {
        if (is_array($data)) {
            foreach ($data as &$it) {
                $this->parseNull($it);
            }
        } else {
            if (is_null($data)) {
                $data = '';
            }
        }
    }
}
