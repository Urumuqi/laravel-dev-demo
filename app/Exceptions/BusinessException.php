<?php
/**
 * 业务异常 异常类.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class BusinessException.
 */
class BusinessException extends Exception
{
    /**
     * exception category, 用来标记不用的业务,方便查询和过滤日志.
     *
     * @var string
     */
    protected $category;

    /**
     * constructor.
     *
     * @param string     $message
     * @param integer    $code
     * @param string     $category
     * @param \Throwable $previous
     */
    public function __construct($message = '', $code = 0, $category = 'default', Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * get business exception category.
     * can not be overwritten.
     *
     * @return string
     */
    final public function getCategory()
    {
        return $this->category;
    }
}
