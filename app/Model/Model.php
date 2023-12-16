<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Model;

use Hyperf\DbConnection\Model\Model as BaseModel;
use Hyperf\ModelCache\Cacheable;
use Hyperf\ModelCache\CacheableInterface;

abstract class Model extends BaseModel implements CacheableInterface
{
    use Cacheable;

    /**
     * 设置 数据
     *
     * @param $data
     * @return $this
     * @author dongasai
     * Date 2023/12/9 11:46
     */
    public function setData($data)
    {

        foreach ($data as $k => $va) {
            if ($this->primaryKey == $k) {
                continue;
            }
            $this->$k = $va;
        }
        return $this;
    }

}
