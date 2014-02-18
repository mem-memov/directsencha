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

        if ($post->has('extType')) {
            
            return array($this->makeFormRequest($post, $files));
            
        }
        
        if ($rawRequest->hasKeyInRows('tid')) {
            
            return $this->makeBatchRequests($rawRequest);
            
        }
        
    }
    
    private function makeBatchRequests(IRawRequest $rawRequest) {
        
        $requests = array();
        
        $rpcDefaults = array(
            'type' => '', // request type
            'action' => '', // class name
            'method' => '', // method name
            'data' => array(), // parameter array
            'tid' => '' // request ID
        );
        
        $rows = $rawRequest->getRowsWithKeys($rpcDefaults);
        
        foreach ($rows as $row) {
            
            $requests[] = new Batch(
                $row['tid'],
                $row['action'],
                $row['method'],
                $row['data'],
                $row['type']
            );
            
        }
        
        return $requests;
        
    }
    
    private function makeFormRequest(IPost $post, IFiles $files) {
        
        return new Form($post, $files);
        
    }
    
}