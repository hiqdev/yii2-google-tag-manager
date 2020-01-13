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

use yii\base\Event;
use yii\web\View;

/**
 * Class Behavior
 * @package hiqdev\yii2\GoogleTagManager
 */
class Behavior extends \yii\base\Behavior
{
    /**
     * @var CodeBuilder
     */
    private $builder;

    /**
     * Behavior constructor.
     * @param CodeBuilder $builder
     * @param array $config
     */
    public function __construct(CodeBuilder $builder, array $config = [])
    {
        parent::__construct($config);

        $this->builder = $builder;
    }

    /**
     * @return string[]
     */
    public function events(): array
    {
        return [
            View::EVENT_BEGIN_PAGE => 'onBeginPage',
            View::EVENT_END_BODY => 'onEndBody',
        ];
    }

    /**
     * @param Event $event
     */
    public function onBeginPage(Event $event): void
    {
        echo $this->getBuilder()->render('head');
    }

    /**
     * @param Event $event
     */
    public function onEndBody(Event $event): void
    {
        echo $this->getBuilder()->render('body');
    }

    /**
     * @return CodeBuilder
     */
    public function getBuilder(): CodeBuilder
    {
        return $this->builder;
    }
}
