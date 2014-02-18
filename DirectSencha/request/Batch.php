<?php
namespace DirectSencha\request;
class Batch extends AbstractRequest {
    
    private $transactionId;
    private $class;
    private $method;
    private $parameters;
    private $type;
    
    public function __construct(
        $transactionId,
        $class,
        $method,
        array $parameters,
        $type
    ) {
        
        $this->transactionId = $transactionId;
        $this->class = $class;
        $this->method = $method;
        $this->parameters = $parameters;
        $this->type = $type;
        
    }
    
}