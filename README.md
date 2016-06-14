##### diversen\markdownDocs

Very simple class that generates simple markdown from phpdoc format
The real work is done through `Nette\Reflection` 

Install:

    composer require diversen/php-markdown-docs

Usage: 

    use diversen\markdownDocs;

    $md = new markdownDocs();
    $class = 'PDO';
    $md->classToMD($class);
     
    echo $md->getOutput();

##### Properties

###### protected output 

    Var holding markdown output

##### Methods

###### public classToMD 

    Generates markdown output for a specified class

    @param string $class e.g. `PDO` or a user class like `diversen\markdownDocs`

###### protected getNL 

    Returns two newlines. Used when creating the markdown string

    @return string $str

###### protected parseAnnotations 

    Add markdown to output from description, params and return

    @param array $ary array of annotation

###### protected parseParams 

    Parses params from annotation

    @param array $ary

    @return string $str markdown

###### protected sectionHeader 

    Return markdown headers

    @param type $name

    @return type

###### protected methodHeader 

    Return method headers

    @param string $name

    @param array $mods modifiers

    @return string $str

###### public getOutput 

    Returns the markdown phpdocs

    @return string

