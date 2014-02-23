<?php
namespace DirectSencha\response;
class Factory 
implements
    \DirectSencha\action\IResponseFactory
{
    
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
    
    public function makeExceptionMessage(IRequest $request, IException $exception) {
        
        return new ExceptionMessage($request, $exception);
        
    }
    
    public function makeRpcResponse() {
        
        return new RpcResponse();
        
    }
    
}