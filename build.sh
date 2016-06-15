#!/bin/sh

./bin/md-to-docs generate --md 'diversen\markdownDocs' 'diversen\classTest' > README.md

#php test.php > README.md

markdown-toc -i README.md

