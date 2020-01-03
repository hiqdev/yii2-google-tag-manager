<?php
/**
 * Google Analytics tracking widget for Yii2 applications
 *
 * @link      https://github.com/hiqdev/yii2-google-analytics
 * @package   yii2-google-analytics
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

if (empty($params['GoogleTagManager.id'])) {
    return [];
}

return [
    'components' => [
        'view' => [
            'as GoogleTagManager' => [
                'class' => \hiqdev\yii2\GoogleTagManager\Behavior::class,
            ],
        ],
    ],
    'container' => [
        'definitions' => [
            \hiqdev\yii2\GoogleTagManager\CodeBuilder::class => [
                'id' => $params['GoogleTagManager.id'],
            ],
        ],
    ],
];
