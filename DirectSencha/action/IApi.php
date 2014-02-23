<?php
namespace DirectSencha\action;
interface IApi {
    
    public function getArgumentListLength($namespace, $class, $method);
    
    public function getMethodParameters($namespace, $class, $method);
    
}