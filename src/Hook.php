<?php
namespace Kumaomao\Hook;

use Hyperf\Utils\ApplicationContext;
use Kumaomao\Hook\Action\HookAction;
use Psr\EventDispatcher\EventDispatcherInterface;

class Hook
{

    public static function add($hook){
        $result = ApplicationContext::getContainer()
            ->get(EventDispatcherInterface::class)
            ->dispatch(new HookAction($hook));
        return $result;
    }
}