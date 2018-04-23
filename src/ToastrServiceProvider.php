<?php

namespace Baijunyao\LaravelToastr;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布静态资源文件
        $this->publishes([
            __DIR__.'/resources/statics' => public_path('statics'),
        ], 'public');

        // 定义 toastr css 标签
        Blade::directive('toastrcss', function () {
            $toastrCssPath = asset('statics/toastr-2.1.1/toastr.min.css');
            $toastrCss = <<<php
<link href="$toastrCssPath" rel="stylesheet" type="text/css" />
php;
            return $toastrCss;
        });

        // 定义 toastr js 标签
        Blade::directive('toastrjs', function () {
            $toastrJsPath = asset('statics/toastr-2.1.1/toastr.min.js');
            $jqueryJsPath = asset('statics/jquery-2.2.4/jquery.min.js');
            $toastrJs = <<<php
<script>
    (function(){
        window.jQuery || document.write('<script src="$jqueryJsPath"><\/script>');
    })();
</script>
<script src="$toastrJsPath"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "progressBar": true
    }
</script>
php;
            return $toastrJs;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
