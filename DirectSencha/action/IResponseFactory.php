<?php
namespace DirectSencha\action;
interface IResponseFactory {

    public function makeRpcResponse();
    
    public function makeExceptionMessage($request, $exception);
    
}