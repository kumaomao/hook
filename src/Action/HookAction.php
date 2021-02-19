<?php
namespace Kumaomao\Hook\Action;

use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Utils\Context;
use Kumaomao\Hook\Annotations\Hook;

class HookAction
{
    public $result;
    
    public function __construct($hook,$params,$once)
    {
        $hook_list = AnnotationCollector::getMethodsByAnnotation("Kumaomao\Hook\Annotations\Hook");
        $method = [];
        foreach ($hook_list as $class => $metadata){
            $annotation = $metadata['annotation'];
            if($annotation->hook == $hook){
                $method = $metadata;
            }

        }

      if($method){
          $this->result = [
              'class' => $method['class'],
              'method' => $method['method']
          ];
      }else{
          $this->result = false;
      }

    }





}