<?php
namespace DirectSencha\request;
class FormRequest 
implements 
    \DirectSencha\action\IRequest 
{
    
    private $transactionId;
    private $class;
    private $method;
    private $parameters;
    private $isUpload;
    private $type;

    /**
     *
     * @var \DirectSencha\request\IFiles 
     */
    private $files;
    
    public function __construct(IPost $post, IFiles $files) {
        
        $rpcDefaults = array(
            'extType' => '', // request type
            'extAction' => '', // class name
            'extMethod' => '', // method name
            'extUpload' => false, // file upload flag
            'extTID' => '' // request ID
        );
        
        $rpcValues = $post->getValuesUsingDefaults($rpcDefaults);
        $formValues = $post->getValuesSkippingKeys(array_keys($rpcDefaults));
        
        $this->transactionId = $rpcValues['extTID'];
        $this->class = $rpcValues['extAction'];
        $this->method = $rpcValues['extMethod'];
        $this->parameters = $formValues;
        $this->isUpload = ($rpcValues['extUpload'] == 'true');
        $this->type = $rpcValues['extType'];

    }
    
    public function makeAction(IActionFactory $actionFactory, $api) {

        return $actionFactory->makeFormAction($this, $api);
    
    }
    
    public function makeOutput(IOutputFactory $outputFactory, $responseFactory) {
        
        return $outputFactory->makeFormOutput($responseFactory);
        
    }
    
    public function getTransactionId() {
        
        return $this->transactionId;
        
    }
    
}