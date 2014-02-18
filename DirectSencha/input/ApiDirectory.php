<?php
namespace DirectSencha\input;
class ApiDirectory {
    
    private $path;
    
    public function __construct($path) {
        
        $this->path = $path;
        
    }
    
    public function getPhpMap() {
        
        return require_once($this->path.'/api.php');
        
    }
    
}