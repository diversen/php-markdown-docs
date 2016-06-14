### diversen\markdownDocs

<!-- toc -->

- [About](#about)
- [Install](#install)
- [Usage](#usage)
- [Properties](#properties)
  * [protected output](#protected-output)
- [Methods](#methods)
  * [public classToMD](#public-classtomd)
  * [protected getNL](#protected-getnl)
  * [protected parseAnnotations](#protected-parseannotations)
  * [protected parseParams](#protected-parseparams)
  * [protected sectionHeader](#protected-sectionheader)
  * [protected methodHeader](#protected-methodheader)
  * [public getOutput](#public-getoutput)

<!-- tocstop -->

### About

Simple class that generates `markdown` from `php` source files (using phpdocs format)
The real work is done through `Nette\Reflection`. See: https://github.com/nette/reflection

This README.md is created with `php-markdown-docs` using the https://github.com/diversen/php-markdown-docs/blob/master/test.php 
file. Like this:

    php test.php > README.md

You can also inject a TOC using `markdown-toc`: 
    
    markdown-toc -i README.md 

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

### Properties

#### protected output 

    Var holding markdown output

### Methods

#### public classToMD 

    Generates markdown output for a specified class

    @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`

#### protected getNL 

    Returns two newlines. Used when creating the markdown string

    @return string $str

#### protected parseAnnotations 

    Add markdown to output from description, params and return

    @param array $ary array of annotation

#### protected parseParams 

    Parses params from annotation

    @param array $ary

    @return string $str markdown

#### protected sectionHeader 

    Return markdown headers

    @param type $name

    @return type

#### protected methodHeader 

    Return method headers

    @param string $name

    @param array $mods modifiers

    @return string $str

#### public getOutput 

    Returns the markdown phpdocs

    @return string

