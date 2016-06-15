<!-- toc -->

### About 

Simple and easy to use documentation system for PHP classes, 
which generates Markdown output. It works easy 
with e.g. github.com, as you will be able to include documentation
for your classes in `README.md` files - like the one you 
probably are looking at now. Best suited for small code libs
with maybe a couple of classes. 

### Install

    composer require diversen/php-markdown-docs

### Usage
~~~php
    use diversen\markdownDocs;

    $md = new markdownDocs();
    // Class to be generate documentaiton for
    $class = 'diversen\markdownDocs';
    $md->classToMD($class);
     
    echo $md->getOutput();
~~~

### As binary

    ./vendor/bin/markdown-docs generate --public --run 'diversen\markdownDocs' 'another\class'

This will just output the markdown docs to stdout, so you will need to collect it.
    
If you want both `private, public, and protected` methods in the docs, you can remove the
`--public` flag. This flag means that only `public` properties and methods will be included in
the output.  
 
You can run it on any class that is autoloaded with `composer` `autoload.php`  
