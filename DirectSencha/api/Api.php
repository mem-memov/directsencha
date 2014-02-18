<?php
namespace DirectSencha\api;
class Api {
    
    private $map;
    
    /**
     * 
     * @param str $apiDirectory
     */
    public function __construct(IApiDirectory $apiDirectory) {
        
        $this->map = $apiDirectory->getPhpMap();
        
    }

    /**
     * @param str $namespace
     * @param str $class
     * @param str $method
     * @return int
     * @throws \DirectSencha\api\ApiHasNoMethod 
     */
    public function getArgumentListLength($namespace, $class, $method) {
        
        $this->requireMethod($namespace, $class, $method);

        return $this->map[$namespace][$class][$method]['length'];
        
    }
    
    /**
     * 
     * @param string $class
     * @param string $method
     * @return array
     * @throws \DirectSencha\api\ApiHasNoMethod
     */
    public function getMethodParameters($namespace, $class, $method) {
        
        $this->requireMethod($namespace, $class, $method);

        return $this->map[$namespace][$class][$method]['parameters'];
        
    }
    
    /**
     * Check if a class method is present in the API
     * @param str $namespace
     * @param str $class
     * @param str $method
     * @return void
     * @throws \DirectSencha\api\ApiHasNoMethod
     */
    private function requireMethod($namespace, $class, $method) {

        if (isset($this->map[$namespace][$class][$method])) {
            
            throw new ApiHasNoMethod('Method '.$class.'::'.$method.' is not defined or its access has been restricted.');
            
        }
        
    }
    
}