<?php
namespace Kumaomao\Hook\Listener;

use Hyperf\Event\Contract\ListenerInterface;
use Kumaomao\Hook\Action\HookAction;

class HookListener implements ListenerInterface
{

    public function listen(): array
    {
        // TODO: Implement listen() method.
        return [
            HookAction::class
        ];
    }

    public function process(object $event)
    {
        // TODO: Implement process() method.
    }

}