<?php
namespace DirectSencha\request;
interface IPost {
    
    public function has($key);
    
    public function getValuesUsingDefaults(array $defaultValues);

    public function getValuesSkippingKeys(array $keys);
    
}