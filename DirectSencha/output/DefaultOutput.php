<?php
namespace DirectSencha\output;
class DefaultOutput 
implements
    IOutput
{
    
    public function addResponse(IAction $action) {}
    
    public function getHeaders() {
        
        return array();

    }
    
    public function getContent() {

        return '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body>Wrong request. Check the API.</body>';
        
    }
    
}