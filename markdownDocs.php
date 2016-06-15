<?php

namespace diversen;

use Nette\Reflection\ClassType;

/**
 * 
 * 
 * 
 * ### About
 * 
 * Simple class that generates `markdown` from `php` source files (using phpdocs format)
 * The real work is done through `Nette\Reflection`. See: https://github.com/nette/reflection
 * 
 * This README.md is created with `php-markdown-docs` using the https://github.com/diversen/php-markdown-docs/blob/master/test.php 
 * file. Like this:
 * 
 *     php test.php > README.md
 * 
 * You can also inject a TOC using `markdown-toc`: 
 *     
 *     markdown-toc -i README.md 
 * 
 * ### Install
 * 
 *     composer require diversen/php-markdown-docs
 * 
 * ### Usage
 * ~~~php
 *     use diversen\markdownDocs;
 * 
 *     $md = new markdownDocs();
 *     $class = 'PDO';
 *     $md->classToMD($class);
 *      
 *     echo $md->getOutput();
 * ~~~
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
     * @return void the method adds to $output
     */
    public function classToMD ($class) {
        
        $r = new ClassType($class);
        
        // TOC
        $this->output.= '<!-- toc -->' . $this->getNL();
        
        // Class description
        $this->output.= $r->getDescription() . $this->getNL();

        // Get methods and props
        $methods    = $r->getMethods();
        $props      = $r->getDefaultProperties();
        
        $this->output.= $this->sectionHeader('Class: ' . $r->getName(), 3);
        
        // Parse properties
        $this->output.= $this->sectionHeader("Properties");
        foreach ($props as $key => $property) {
            $prop = $r->getProperty($key);
            if ($prop->isPublic()) {
                 $this->parseMethod($prop);
            }
        }
        
        foreach ($props as $key => $property) {
            $prop = $r->getProperty($key);
            if ($prop->isProtected()) {
                 $this->parseMethod($prop);
            }
        }
        
        foreach ($props as $key => $property) {
            $prop = $r->getProperty($key);
            if ($prop->isPrivate()) {
                 $this->parseMethod($prop);
            }
        }
        
        $this->output.= $this->sectionHeader("Methods");
        foreach ($methods as $method) {
            if ($method->isPublic()) {
                 $this->parseMethod($method);
            }
        }

        foreach ($methods as $method) {
            if ($method->isProtected()) {
                 $this->parseMethod($method);
            }
        }

        foreach ($methods as $method) {
            if ($method->isPrivate()) {
                 $this->parseMethod($method);
            }
        }       
    }
    
    /**
     * Parses a method or a property
     * @param object \Nette\Reflection\Property
     */
    protected function parseMethod ($method) {
        $mods = $this->getModifiers($method); 
        $this->output.= $this->methodHeader($method->name, $mods);
        $ary = $method->getAnnotations();
        $this->output.= $this->parseAnnotations($ary);
    }


    
    /**
     * Returns two newlines. Used when creating the markdown string
     * @return string $str
     */
    protected function getNL() {
        return PHP_EOL . PHP_EOL;
    }
    
    /**
     * Returns two newlines. Used when creating the markdown string
     * @return string $str
     */
    protected function getTab() {
        return "    ";
    }
    
    /**
     * Returns and array of modifiers from a method or a property
     * @param object $method
     * @return array $ary, e.g. ['public', 'static']
     */
    protected function getModifiers ($method) {
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
     * Add markdown to output from description, params  
     * @param array $ary array of annotation
     */
    protected function parseAnnotations ($ary) {
        if (isset($ary['description'])) {
            $this->output.= $this->getTab() . $ary['description']['0'] . $this->getNL();
        } else {
            $this->output.= $this->getTab() . "No description" . $this->getNL();
        }
        
        if (isset($ary['param'])) {
            $this->output.= $this->parseParams ($ary['param']);
        }
        
        if (isset($ary['return'])) {
            $this->output.= $this->getTab() . "@return " . $ary['return']['0'] . $this->getNL();
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
           $str.= $this->getTab() . "@param " . $val . $this->getNL();
        }
        return $str;
    }
    
    /**
     * Return a header
     * @param string $name
     * @return string $str markdown header
     */
    protected function sectionHeader ($name, $level = 4) {
        $header = str_repeat('#', $level);
        return "$header $name". $this->getNL();
    }
    
    /**
     * Return method headers
     * @param string $name
     * @param array $mods modifiers
     * @return string $str markdown header
     */
    protected function methodHeader ($name, $mods, $level = 5) {
        $header = str_repeat('#', $level);
        $mod_str = implode(' ', $mods);
        return "$header " . "$mod_str $name" . $this->getNL();
    }

    /**
     * Returns the markdown phpdocs
     * @return string $output the final markdown output
     */
    public function getOutput () {
        return $this->output;
    }
}
