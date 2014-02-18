<?php
namespace DirectSencha\input;
class UriTest extends \PHPUnit_Framework_TestCase {
    
    public function testGetUri() {
        
        $server = array(
            'REQUEST_URI' => '12345'
        );
        
        $uri = $server['REQUEST_URI'];
        
        $uriObject = new Uri($uri);
        
        $this->assertEquals(
            $server['REQUEST_URI'],
            $uriObject->getUri()
        );
        
    }
    
}