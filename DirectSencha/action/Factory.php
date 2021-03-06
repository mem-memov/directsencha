<?php
namespace DirectSencha\action;
class Factory 
implements
    \DirectSencha\request\IActionFactory
{
    
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
    
    public function makeFormAction(IRequest $request, IApi $api) {
        
        
        
    }
    
    public function makeBatchAction(IRequest $request, IApi $api) {
        
        
        
    }
    
}