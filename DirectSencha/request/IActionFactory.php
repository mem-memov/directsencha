<?php
namespace DirectSencha\request;
interface IActionFactory {
    
    public function makeFormAction($api);
    
    public function makeBatchAction($api);
    
}