<?php
namespace DirectSencha\input;
/**
 * Wrapper for the global $_POST array
 */
class Post 
implements
    \DirectSencha\request\IPost
{
    
    private $post;
    
    public function __construct($post) {
        
        $this->post = $post;
        
    }
    
    public function has($key) {
        
        return array_key_exists($key, $this->post);
        
    }
    
}