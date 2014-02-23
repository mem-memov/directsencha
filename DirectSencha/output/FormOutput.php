<?php
namespace DirectSencha\output;
class FormOutput 
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
     * @var IResponse
     */
    private $response;
    
    public function __construct(
        IResponseFactory $responseFactory
    ) {
        
        $this->responseFactory = $responseFactory;
        
        $this->response = null;
        
    }
    
    public function addResponse(IAction $action) {
        
        try {
            
            if (!is_null($this->response)) {
                throw new FormOutputMustHaveOneResponse();
            }
            
            $this->response = $action->run($this->responseFactory);
            
        } catch (Exception $exception) {

            $this->response = $action->refuse($this->responseFactory, $exception);
            
        }
        
    }
    
    public function getHeaders() {

        return array('Content-Type: text/html');
        
    }
    
    public function getContent() {
        
        if (is_null($this->response)) {
            throw new FormOutputMustHaveOneResponse();
        }

        $result = $this->response->toArray();

        return utf8_encode(json_encode($result));
        
    }
    
}