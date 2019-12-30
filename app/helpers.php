<?php

if( ! function_exists('user') ) {
    function user() {
        return auth()->user();
    }
}

if( ! function_exists('admin') ) {
    function admin() {
        return auth('admin')->user();
    }
}
