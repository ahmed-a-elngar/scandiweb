<?php

function old($key)
{
    return $_SESSION[$key] ?? '';
}

function storeFormData($request)
{
    foreach ($request as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

function freeFormData($request)
{
    foreach ($request as $key => $value) {
        unset($_SESSION[$key]);
    }
}

function freeData()
{
    session_unset();
}
