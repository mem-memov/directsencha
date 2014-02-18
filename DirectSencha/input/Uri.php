<?php
namespace DirectSencha\input;
/**
 * Wrapper for the request URI
 */
class Uri {
    
    private $uri;
    
    public function __construct($uri) {
        
        $this->uri = $uri;
        
    }
    
    public function getUri() {
        
        return $this->uri;
        
    }
    
}