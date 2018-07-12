<?php

if (!function_exists('toastr_css')){
    /**
     * toastr css标签
     *
     * @param string $message
     */
    function toastr_css()
    {
        $toastrCssPath = asset('statics/toastr-2.1.1/toastr.min.css');
        $toastrCss = <<<php
<link href="$toastrCssPath" rel="stylesheet" type="text/css" />
php;
        return $toastrCss;
    }
}

if (!function_exists('toastr_js')){
    /**
     * toastr js标签
     *
     * @param string $message
     */
    function toastr_js()
    {
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
    }
}