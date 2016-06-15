<!-- toc -->

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

    php-markdown-docs.phar generate --run --public 'diversen\cli'
