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
     * @inheritDoc
     */
    public function events(): array
    {
        return [
            View::EVENT_BEGIN_PAGE => 'onBeginPage',
            View::EVENT_BEGIN_BODY => 'onBeginBody',
            View::EVENT_END_PAGE => 'onEndPage',
        ];
    }

    /**
     * @param Event $event
     */
    public function onBeginBody(Event $event): void
    {
        echo $this->getBuilder()->render('body');
    }

    /**
     * @param Event $event
     */
    public function onBeginPage(Event $event): void
    {
        ob_start();
    }

    /**
     * @param Event $event
     */
    public function onEndPage(Event $event): void
    {
        $page = ob_get_clean();
        preg_match('/<\s*(head|HEAD)[^>]*>/', $page, $output, PREG_OFFSET_CAPTURE);
        if (empty($output)) {
            return;
        }
        $pastePoint = $output[0][1] + strlen($output[0][0]);
        echo substr_replace($page, $this->getBuilder()->render('head'), $pastePoint, 0);
    }

    /**
     * @return CodeBuilder
     */
    public function getBuilder(): CodeBuilder
    {
        return $this->builder;
    }
}
