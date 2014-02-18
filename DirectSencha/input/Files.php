<?php
namespace DirectSencha\input;
/**
 * Wrapper for the global array $_FILES
 */
class Files {
    
    private $files;
    
    public function __construct(array $files) {
        
        $this->files = $files;
        
    }
    
}