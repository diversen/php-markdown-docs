

<!-- toc -->

- [Install](#install)
- [Install as PHAR](#install-as-phar)
- [Usage as lib](#usage-as-lib)
- [Usage as PHAR](#usage-as-phar)
- [Class: diversen\markdownDocs](#class-diversenmarkdowndocs)
  * [Properties](#properties)
  * [Methods](#methods)
    + [public classToMD](#public-classtomd)
    + [public getOutput](#public-getoutput)

<!-- tocstop -->

### Install

    composer require diversen/php-markdown-docs

### Install as PHAR

    git clone https://github.com/diversen/php-markdown-docs
	
    phar-composer build php-markdown-docs/

[https://github.com/clue/phar-composer](https://github.com/clue/phar-composer)

### Usage as lib
~~~php
    use diversen\markdownDocs;

    $md = new markdownDocs();
    $class = 'PDO';
    $md->classToMD($class);
     
    echo $md->getOutput();
~~~

### Usage as PHAR

Run it inside a dir where there is a vendor/autoload.php file, and specify
the class as last argument. E.g: 

    php-markdown-docs.phar generate --run --public 'diversen\cli'
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

