<?php
namespace DirectSencha\request;
interface IRawRequest {
    
    public function hasKeyInRows($key);
    
    public function getRow($index, array $defaultValues);
    
}