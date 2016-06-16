#!/bin/sh

cat intro.md > README.md

./bin/markdown-docs --public 'diversen\markdownDocs' >> README.md

markdown-toc -i README.md

