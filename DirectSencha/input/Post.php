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
    
    public function getValuesUsingDefaults(array $defaultValues) {

        $values = array();

        foreach ($defaultValues as $key => $defaultValue) {

            if (!array_key_exists($key, $this->post)) {

                $values[$key] = $defaultValue;

            } else {

                $values[$key] = $this->post[$key];

            }

        }

        return $values;
        
    }
    
    public function getValuesSkippingKeys(array $skippedKeys) {
        
        $values = array();

        foreach ($this->post as $key => $value) {

            if (!in_array($key, $skippedKeys)) {

                $values[$key] = $value;

            }

        }

        return $values;
        
    }
    
}