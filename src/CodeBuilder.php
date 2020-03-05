<?php
/**
 * Google Analytics tracking widget for Yii2 applications
 *
 * @link      https://github.com/hiqdev/yii2-google-analytics
 * @package   yii2-google-analytics
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\yii2\GoogleTagManager;

use Yii;

/**
 * Class CodeBuilder
 * @package hiqdev\yii2\GoogleTagManager
 */
class CodeBuilder extends \yii\base\BaseObject
{
    /**
     * @var string|array
     */
    public $id;

    /**
     * @var array
     */
    public $params = [];

    /**
     * @return \yii\base\View|\yii\web\View
     */
    public function getView()
    {
        return Yii::$app->getView();
    }

    /**
     * @param string $fileName
     * @return string
     */
    public function render(string $fileName): string
    {
        $res = '';
        foreach ($this->getIds() as $id) {
            if (empty($id)) {
                continue;
            }
            $res .= $this->getView()->render("@hiqdev/yii2/GoogleTagManager/views/$fileName.php", $this->prepareData($id));
        }

        return $res;
    }

    /**
     * @return array
     */
    private function prepareData(string $id): array
    {
        return [
            'id' => $id,
            'params' => $this->prepareParams($id),
        ];
    }

    /**
     * @return array
     */
    private function prepareParams($id): array
    {
        return array_filter(array_merge($this->params, [
            'id' => $id,
        ]));
    }

    public function getIds(): array
    {
        if (is_array($this->id)) {
            return $this->id;
        }

        return explode(',', (string)$this->id);
    }
}
