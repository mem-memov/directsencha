<?php
namespace DirectSencha\output;
class BatchOutput
implements
    IOutput
{

    /**
     *
     * @var \DirectSencha\output\IResponseFactory
     */
    private $responseFactory;
    
    /**
     *
     * @var \DirectSencha\output\IResponse[]
     */
    private $responses;
    
    public function __construct(
        IResponseFactory $responseFactory
    ) {
        
        $this->responseFactory = $responseFactory;
        
        $this->responses = array();
        
    }
    
    public function addResponse(IAction $action) {
        
        try {
            
            $response = $action->run($this->responseFactory);
            
        } catch (Exception $exception) {

            $response = $action->refuse($this->responseFactory, $exception);
            
        }
        
        $this->responses[] = $response;
        
    }
    
    public function getHeaders() {

        return array('Content-Type: text/javascript');
        
    }
    
    public function getContent() {

        $results = array();
        
        foreach ($this->responses as $response) {
            
            $results[] = $response->toArray();
            
        }
        
        return utf8_encode(json_encode($results));
        
    }
    
}