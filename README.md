

<!-- toc -->

- [About](#about)
- [Install](#install)
- [Usage (lib)](#usage-lib)
- [Usage (binary)](#usage-binary)
- [Class: diversen\markdownDocs](#class-diversenmarkdowndocs)
  * [Properties](#properties)
  * [Methods](#methods)
    + [public classToMD](#public-classtomd)
    + [public getOutput](#public-getoutput)

<!-- tocstop -->

### About 

Simple and easy to use documentation system for PHP classes, 
which generates Markdown output. It works easy 
with e.g. github.com, as you will be able to include documentation
for your classes in `README.md` files - like the one you 
probably are looking at now. Best suited for small code libs
with maybe a couple of classes. 

### Install

    composer require diversen/php-markdown-docs

### Usage (lib)
~~~php
    use diversen\markdownDocs;

    $md = new markdownDocs();
    // Class to be generate documentaiton for
    $class = 'diversen\markdownDocs';
    $md->classToMD($class);
     
    echo $md->getOutput();
~~~

### Usage (binary)

When the lib is installed you have access to the `markdown-docs` binary, and you can
use in a way similar to this:

    ./vendor/bin/markdown-docs generate --public --run 'diversen\markdownDocs' 'another\class'

This will just output the markdown documentation to `stdout`, so you will need to redirect it, e.g. to a file.
    
If you want both `private, public, and protected` methods in the documentation, you can remove the
`--public` flag. This flag means that only `public` properties and methods will be included in
the output.  
 
You can run it on any class that is autoloaded with `composer` `autoload.php`  


### Class: diversen\markdownDocs

* * * * *

Simple class that generates `markdown` from `php` source files (using phpdocs format)
The real work is done through `Nette\Reflection`. See: https://github.com/nette/reflection



#### Properties

* * * * *



#### Methods

* * * * *

##### public classToMD

    Generates markdown output for a specified class

    @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`

    @return void the method adds to $output

##### public getOutput

    Returns the markdown phpdocs

    @return string $output the final markdown output

