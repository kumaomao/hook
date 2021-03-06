<?php
namespace Kumaomao\Hook\Annotations;

use Hyperf\Di\Annotation\AbstractAnnotation;
use Hyperf\Utils\Context;

/**
 * hook注解
 * Class Validate
 * @package Kumaomao\Validate\Annotations
 * @Annotation
 * @Target({"METHOD"})
 */
class Hook extends AbstractAnnotation
{
    /**
     * hook标识
     * @var string
     */
    public $hook = '';

    public function __construct($value = null)
    {
        parent::__construct($value);
        $this->bindMainProperty('hook', $value);
    }


    public function collectMethod(string $className, ?string $target): void
    {
        parent::collectMethod($className, $target); // TODO: Change the autogenerated stub
    }

}