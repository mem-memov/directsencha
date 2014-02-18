<?php
namespace DirectSencha\input;
/**
 * Wrapper for the raw request
 */
class RawRequest 
implements
    \DirectSencha\request\IRawRequest
{
    
    private $data;
    
    public function __construct($rawRequestString) {
        
        $this->data = json_decode($rawRequestString);
        
        if (!is_array($this->data)) {
            
            $this->data = array();
            
        }
        
    }
    
    public function hasKeyInRows($key) {
        
        foreach ($this->data as $row) {
            
            if (!is_array($row)) {
                return false;
            }
            
            if (!array_key_exists($key, $row)) {
                return false;
            }
            
        }
        
    }
    
    public function getRowsWithKeys(array $defaultValues) {
        
        $resultRows = array();
        
        foreach ($this->data as $row) {
            
            if (!is_array($row)) {
                return array();
            }
            
            $resultRow = array();

            foreach ($defaultValues as $key => $defaultValue) {
                
                if (!array_key_exists($key, $row)) {
                    
                    $resultRow[$key] = $defaultValue;
                    
                } else {
                    
                    $resultRow[$key] = $row[$key];
                    
                }
                
            }
            
            $resultRows[] = $resultRow;
            
        }
        
        return $resultRows;
        
    }
    
}