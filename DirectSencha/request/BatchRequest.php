<?php
namespace DirectSencha\request;
class BatchRequest 
implements 
    \DirectSencha\action\IRequest 
{
    
    private $transactionId;
    private $class;
    private $method;
    private $parameters;
    private $type;
    
    public function __construct(IRawRequest $rawRequest, $rowIndex) {
        
        $rpcDefaults = array(
            'type' => '', // request type
            'action' => '', // class name
            'method' => '', // method name
            'data' => array(), // parameter array
            'tid' => '' // request ID
        );
        
        $rpcValues = $rawRequest->getRow($rowIndex, $rpcDefaults);
        
        $this->transactionId = $rpcValues['tid'];
        $this->class = $rpcValues['action'];
        $this->method = $rpcValues['method'];
        $this->parameters =  $rpcValues['data'];
        $this->type =  $rpcValues['type'];
        
    }
    
    public function makeAction(IActionFactory $actionFactory, $api) {
        
        return $actionFactory->makeBatchAction($this, $api);
    
    }
    
    public function makeOutput(IOutputFactory $outputFactory, $responseFactory) {
        
        return $outputFactory->makeBatchOutput($responseFactory);
        
    }
    
    public function getTransactionId() {
        
        return $this->transactionId;
        
    }
    
}