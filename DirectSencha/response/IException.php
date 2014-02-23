<?php
namespace DirectSencha\response;
interface IException {
    
    public function getMessage();
    
    public function getTraceAsString();
    
}