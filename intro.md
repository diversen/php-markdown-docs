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

### As binary

    ./vendor/bin/markdown-docs generate --public --run 'diversen\markdownDocs' 'another\class'
