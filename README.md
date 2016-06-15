

<!-- toc -->

- [Install](#install)
- [Usage](#usage)
- [Class: diversen\markdownDocs](#class-diversenmarkdowndocs)
  * [Properties](#properties)
  * [Methods](#methods)
    + [public classToMD](#public-classtomd)
    + [public getOutput](#public-getoutput)

<!-- tocstop -->

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

#### Methods

##### public classToMD

    Generates markdown output for a specified class

    @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`

    @return void the method adds to $output

##### public getOutput

    Returns the markdown phpdocs

    @return string $output the final markdown output

