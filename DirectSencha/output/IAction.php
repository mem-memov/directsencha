<?php
namespace DirectSencha\output;
interface IAction {
    
    public function run($responseFactory);
    
    public function refuse($responseFactory, $exception);
    
}