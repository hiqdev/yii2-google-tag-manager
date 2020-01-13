<?php
/**
 * Google Analytics tracking widget for Yii2 applications
 *
 * @link      https://github.com/hiqdev/yii2-google-analytics
 * @package   yii2-google-analytics
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\yii2\GoogleTagManager\tests\unit;

use hiqdev\yii2\GoogleTagManager\CodeBuilder;
use Yii;

/**
 * Class CodeBuilderTest
 * @package hiqdev\yii2\GoogleAnalytics\tests
 */
class CodeBuilderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CodeBuilder
     */
    protected $builder;

    /**
     * @var string
     */
    protected $id = 'UA-1234567890-1';

    /**
     * @var array
     */
    protected $params = [
    ];

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->builder = Yii::createObject([
            'class' => CodeBuilder::class,
            'id' => $this->id,
            'params' => $this->params,
        ]);
    }

    public function testRenderHead(): void
    {
        $sample = file_get_contents(__DIR__ . '/stub/head.html');
        $this->assertSame(trim($sample), trim($this->builder->render('head')));
    }

    public function testRenderBody(): void
    {
        $sample = file_get_contents(__DIR__ . '/stub/body.html');
        $this->assertSame(trim($sample), trim($this->builder->render('body')));
    }
}
