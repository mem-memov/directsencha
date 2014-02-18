<?php
namespace DirectSencha\loader;
/**
 * Class Loader
 */
class ClassLoader {
    
    private $rootNamespace;
    private $rootPath;
    
    /**
     * Construct a class loader.
     * 
     * @param str $rootNamespace
     * @param str $rootPath
     */
    public function __construct() {
        
        $this->rootNamespace = 'DirectSencha';
        $this->rootPath = dirname(__DIR__);
        
        $this->register();
        
    }

    /**
     * Load the class file
     * 
     * @param str $class
     * @return boolean
     * @throws CanNotFindFile 
     * @throws CanNotFindClass 
     */
    public function loadClass($class) {
        
        list($spaces, $shortName) = $this->parseClass($class);
        
        // stop when there is no root space in the class name
        if (count($spaces) == 0) {
            return false;
        }
        
        $rootSpace = array_shift($spaces);
        
        // stop when the namespace of this library doesn't match the root namespase of the class
        if ($rootSpace !== $this->rootNamespace) {
            return false;
        }
        
        $file = $this->rootPath . '/' . implode('/', $spaces) . '/' . $shortName . '.php';
        var_dump($file);
        if (!file_exists($file)) {
            throw new CanNotFindFile('No file ' . $file . ' for class ' . $class . '.');
        }
        
        require $file;
        
        if (!class_exists($class, false)) {
            throw new CanNotFindFile('No class ' . $class . ' inside file ' . $file . '.');
        }
        
        return true;
        
    }
    
    
    /**
     * Register the loader with SPL autoloader stack.
     * 
     * @return bool
     */
    private function register() {
        
        return spl_autoload_register(array($this, 'loadClass'));
        
    }
    
    /**
     * Parse a full class name into an array with space names and the short file name
     * 
     * @param str $class
     * @return array
     */
    private function parseClass($class) {
        
        $normalizedClass = '\\' . ltrim($class, '\\');
        
        $spaces = explode('\\', $normalizedClass);
        
        $shortName = array_pop($spaces);
        
        // remove first empty element
        array_shift($spaces);
        
        return array($spaces, $shortName);
        
    }

}