<?php
namespace DirectSencha\action;
class BatchAction {
    
    /**
     *
     * @var \DirectSencha\action\IRequest
     */
    private $request;
    
    /**
     *
     * @var \DirectSencha\action\IRequest
     */
    private $api;
    
    public function __construct(IRequest $request, IApi $api) {
        
        $this->request = $request;
        $this->api = $api;
        
    }
    
    public function run(IResponseFactory $responseFactory) {
        
        
        
    }
    
    public function refuse(IResponseFactory $responseFactory, Exception $exception) {
        
        return $responseFactory->makeExceptionMessage($this->request, $exception);
        
    }
    
}