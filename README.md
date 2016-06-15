<!-- toc -->

### Install

    composer require diversen/php-markdown-docs

### Usage
~~~php
    use diversen\markdownDocs;

    $md = new markdownDocs();
    $class = 'PDO';
    $md->classToMD($class);
     
    echo $md->getOutput();
~~~

### Class: diversen\markdownDocs

Simple class that generates `markdown` from `php` source files (using phpdocs format)
The real work is done through `Nette\Reflection`. See: https://github.com/nette/reflection

#### Properties

##### protected output

    Var holding markdown output

#### Methods

##### public classToMD

    Generates markdown output for a specified class

    @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`

    @return void the method adds to $output

##### public getOutput

    Returns the markdown phpdocs

    @return string $output the final markdown output

##### protected parseMethod

    Parses a method or a property

    @param object \Nette\Reflection\Property

##### protected getNL

    Returns two newlines. Used when creating the markdown string

    @return string $str

##### protected getTab

    Returns two newlines. Used when creating the markdown string

    @return string $str

##### protected getModifiers

    Returns and array of modifiers from a method or a property

    @param object $method

    @return array $ary, e.g. ['public', 'static']

##### protected parseAnnotations

    Add markdown to output from description, params

    @param array $ary array of annotation

##### protected parseParams

    Parses params from annotation

    @param array $ary

    @return string $str markdown

##### protected sectionHeader

    Return a header

    @param string $name

    @return string $str markdown header

##### protected methodHeader

    Return method headers

    @param string $name

    @param array $mods modifiers

    @return string $str markdown header

### Class: diversen\classTest

Another class. Just a test class

#### Properties

##### protected output

    Var holding markdown output

#### Methods

##### public flaf

    No description

    @return string hello world

