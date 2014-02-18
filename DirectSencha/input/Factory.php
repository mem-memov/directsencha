<?php
namespace DirectSencha\input;
class Factory {
    
    protected static $instance;
    
    protected function __construct() {}
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\input\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    public function makeApiDirectory() {
        
        
        
    }
    
    public function makeFiles() {
        
        
        
    }
    
    public function makePost() {
        
        
        
    }
    
    public function makeRawRequest() {
        
        
        
    }
    
    public function makeRemoteDirectory() {
        
        
        
    }
    
    public function makeUri() {
        
        
        
    }
    
}