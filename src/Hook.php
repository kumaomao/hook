<?php
namespace Kumaomao\Hook;

use Hyperf\Utils\ApplicationContext;
use Kumaomao\Hook\Action\HookAction;
use Psr\EventDispatcher\EventDispatcherInterface;

class Hook
{

    public static function add($hook,$params = null,$once = false){
        $result = ApplicationContext::getContainer()
            ->get(EventDispatcherInterface::class)
            ->dispatch(new HookAction($hook,$params,$once));
        return $result;
    }
}