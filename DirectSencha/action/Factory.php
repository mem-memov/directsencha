<?php
namespace DirectSencha\action;
class Factory {
    
    protected static $instance;
    
    protected function __construct() {}
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\action\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    public function makeAction(
        IRequest $request,
        IApi $api
    ) {
        
        
        
    }
    
}