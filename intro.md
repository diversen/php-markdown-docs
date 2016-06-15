<!-- toc -->

### Install

    composer require diversen/php-markdown-docs

### Install as phar

    git clone https://github.com/diversen/php-markdown-docs
	
    phar-composer build php-markdown-docs/

    [https://github.com/clue/phar-composer](https://github.com/clue/phar-composer)

### Usage
~~~php
    use diversen\markdownDocs;

    $md = new markdownDocs();
    $class = 'PDO';
    $md->classToMD($class);
     
    echo $md->getOutput();
~~~

