<?php
namespace DirectSencha\action;
interface IRequest {
    
    public function makeAction();
    
    public function getTransactionId();
    
}