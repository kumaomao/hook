<?php
namespace Kumaomao\Hook\Action;

use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Utils\Context;
use Kumaomao\Hook\Annotations\Hook;

class HookAction
{
    private $result = false;

    private $isTrue = true;
    
    public function __construct($hook)
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
          $this->isTrue = false;
      }

    }

    public function isTrue(){
        return $this->isTrue;
    }

    public function run($params = null){
        if($this->result){
            $function  = $this->result['method'];
            return (new $this->result['class'])->$function($params);
        }
       return false;
    }





}