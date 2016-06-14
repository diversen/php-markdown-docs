<?php

namespace diversen;

use Nette\Reflection\ClassType;

/**
 * Very simple class that generates simple markdown from phpdoc format
 * The real work is done through `Nette\Reflection` 
 * 
 * Install:
 * 
 *     composer require diversen/php-markdown-docs
 * 
 * Usage: 
 * 
 *     use diversen\markdownDocs;
 * 
 *     $md = new markdownDocs();
 *     $class = 'PDO';
 *     $md->classToMD($class);
 *      
 *     echo $md->getOutput();
 * 
 */
class markdownDocs  {
    
    /**
     * Var holding markdown output
     * @var string $output
     */
    protected $output = '';
    
    /**
     * Generates markdown output for a specified class
     * @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`
     */
    public function classToMD ($class) {
        
        $r = new ClassType($class);

        // Class header and description
        $this->output.= $this->sectionHeader($r->getName());
        $this->output.= $r->getDescription() . $this->getNL();
        
        // Get methods and props
        $methods = $r->getMethods();
        $props  = $r->getDefaultProperties();
        
        // Parse properties
        $this->output.= $this->sectionHeader("Properties");
 
        foreach ($props as $key => $property) {
            $prop = $r->getProperty($key);
            $prop_mods = $this->getModifiers($prop);
            
            if ($prop->isPublic() OR $prop->isProtected()) {
                
                $this->output.= $this->methodHeader($prop->name, $prop_mods);
                $ary = $prop->getAnnotations();
                $this->output.= $this->parseAnnotations($ary);
            }
        }

        $this->output.= $this->sectionHeader("Methods");
        
        // Parse methods
        foreach($methods as $method) {
            
            $mods = $this->getModifiers($method);                  
            if ($method->isPublic() OR $method->isProtected()) {
                
                $this->output.= $this->methodHeader($method->name, $mods);
                $ary = $method->getAnnotations();
                $this->output.= $this->parseAnnotations($ary);
            }
        }   
    }
    
    /**
     * Returns two newlines. Used when creating the markdown string
     * @return string $str
     */
    protected function getNL() {
        return PHP_EOL . PHP_EOL;
    }
    
    /**
     * Returns and array of modifiers from a method or a property
     * @param object $method
     * @return array $ary, e.g. ['public', 'static']
     */
    private function getModifiers ($method) {
        $mods = array ();
        
        if ($method->isPublic()) {
            $mods[] = 'public';
        }
        
        if ($method->isProtected()) {
            $mods[] = 'protected';
        }
        
        if ($method->isStatic()) {
            $mods[] = 'static';
        }
        return $mods;
        
    }

    /**
     * Add markdown to output from description, params and return   
     * @param array $ary array of annotation
     */
    protected function parseAnnotations ($ary) {
        if (isset($ary['description'])) {
            $this->output.= "    " . $ary['description']['0'] . "\n\n";
        } else {
            $this->output.= "    " . "No description\n\n";
        }
        
        if (isset($ary['param'])) {
            $this->output.= $this->parseParams ($ary['param']);
        }
        
        if (isset($ary['return'])) {
            $this->output.= "    @return " . $ary['return']['0'] . "\n\n";
        }

    }
    
    /**
     * Parses params from annotation
     * @param array $ary
     * @return string $str markdown
     */
    protected function parseParams ($ary) {
        $str = '';
        foreach($ary as $val) {
           $str.= "    @param " . $val . "\n\n";
        }
        return $str;
    }
    
    /**
     * Return markdown headers
     * @param type $name
     * @return type
     */
    protected function sectionHeader ($name) {
        return "### $name". $this->getNL();
    }
    
    /**
     * Return method headers
     * @param string $name
     * @param array $mods modifiers
     * @return string $str
     */
    protected function methodHeader ($name, $mods) {
        $mod_str = implode(' ', $mods);
        return "##### " . "$mod_str $name \n\n";
    }

    /**
     * Returns the markdown phpdocs
     * @return string
     */
    public function getOutput () {
        return $this->output;
    }
}
