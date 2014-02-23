<?php
namespace DirectSencha\response;
class ExeptionMessage 
implements 
    \DirectSencha\output\IResponse
{
    
    private $transactionId;
    
    /**
     * Error message
     * @var string 
     */
    private $message;
    
    /**
     * Fanction call trace
     * @var string 
     */
    private $trace;
    
    private $type;
    
    private $result;
    
    public function __construct(IRequest $request, IException $exception) {
        
        $this->transactionId = $request->getTransactionId();
        $this->message = $exception->getMessage();
        $this->trace = $exception->getTraceAsString();
        $this->type = 'exception';
        $this->result = 'Exception';
        
    }
    
    public function getType() {
        
        return $this->type;
        
    }

    public function toArray() {
        
        return array(
            'type'    => $this->type,
            'tid'     => $this->transactionId,
            'message' => $this->message,
            'where'   => $this->trace,
            'result'  => $this->result
        );
        
    }
    
}