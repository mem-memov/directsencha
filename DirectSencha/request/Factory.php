<?php
namespace DirectSencha\request;
/**
 * Request Factory
 */
class Factory {
    
    protected static $instance;
    
    protected function __construct() {}
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\request\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    public function makeRequests(
        IRawRequest $rawRequest,
        IPost $post,
        IFiles $files
    ) {

        if ($post->has('extTID')) {
            
            return array($this->makeFormRequest($post, $files));
            
        }
        
        if ($rawRequest->hasKeyInRows('tid')) {
            
            return $this->makeBatchRequests($rawRequest);
            
        }
        
    }
    
    private function makeBatchRequests(IRawRequest $rawRequest) {
        
        $requests = array();

        foreach ($rows as $rowIndex => $row) {
            
            $requests[] = new BatchRequest($rawRequest, $rowIndex);
            
        }
        
        return $requests;
        
    }
    
    private function makeFormRequest(IPost $post, IFiles $files) {
        
        return new FormRequest($post, $files);
        
    }
    
}