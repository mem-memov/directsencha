<?php
namespace DirectSencha\api;
class Factory {
    
    protected static $instance;
    private $pool;
    
    protected function __construct() {
        
        $this->pool = array();
        
    }
    
    /**
     * Get the single factory instance
     * @return \DirectSencha\api\Factory
     */
    public static function getInstance() {
        
        if (empty(self::$instance)) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    /**
     * 
     * @param \DirectSencha\api\IApiDirectory $apiDirectory
     * @return \DirectSencha\api\Api
     */
    public function makeApi(IApiDirectory $apiDirectory) {
        
        if (empty($this->pool[__FUNCTION__])) {
            
            $this->pool[__FUNCTION__] = new Api($apiDirectory);
            
        }
        
        return $this->pool[__FUNCTION__];
        
    }
    
}