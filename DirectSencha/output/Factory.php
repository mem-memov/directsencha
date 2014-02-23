<?php
namespace DirectSencha\output;
class Factory 
implements
    \DirectSencha\request\IOutputFactory
{
    
    protected static $instance;
    
    protected function __construct() {}
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\output\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    public function makeFormOutput(IResponseFactory $responseFactory) {
        
        return new FormOutput($responseFactory);
        
    }
    
    public function makeBatchOutput(IResponseFactory $responseFactory) {
        
        return new BatchOutput($responseFactory);
        
    }
    
    public function makeDefaultOutput() {
        
        return new DefaultOutput();
        
    }
    
}