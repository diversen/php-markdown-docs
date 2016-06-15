#!/bin/sh

cat intro.md > README.md

./bin/md-to-docs generate --public --md 'diversen\markdownDocs' 'diversen\classTest' >> README.md

markdown-toc -i README.md

