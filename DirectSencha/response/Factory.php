<?php
namespace DirectSencha\response;
class Factory {
    
    protected static $instance;
    
    protected function __construct() {}
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\response\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    public function makeOutput() {
        
        return new Output();
        
    }
    
}