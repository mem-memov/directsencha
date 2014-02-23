<?php
namespace DirectSencha\request;
interface IOutputFactory {
    
    public function makeFormOutput($responseFactory);
    
    public function makeBatchOutput($responseFactory);
    
}