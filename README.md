# 基于hyperf简单的hook钩子功能实现

# composer安装
```
composer require kumaomao/hook
```

# 设置钩子
```
 /**
  * 首页跳转
  * @RequestMapping("main",methods="get")
  */
public function main(){
    //hook main页面 
    $result = Hook::add('main_view');
    if($result->isTrue()){
        return $result->run();
    }
    return view('index/main');
}
```
```
Hook::add('main_view')  //添加钩子 关键字 main_view

$result->isTrue() //判断钩子是否被触发，触发返回true,未被触发返回false
$result->run()  //钩子触发后调用本方法返回触发方法的执行结果
```

# 钩子触发
```
    /**
     * 用户列表页
     * @RequestMapping("index",methods="GET")
     * @Hook("main_view")
     */
    public function index_view(){
        return view('user/index');
    }

    使用注解 @Hook("关键字")来实现钩子 
```

# 执行结果

当钩子 main_view 未被触发时 页面跳转index/main
当钩子被触发时 页面跳转user/index

