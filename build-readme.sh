#!/bin/sh

cat intro.md > README.md

./bin/markdown-docs generate --public --run 'diversen\markdownDocs' >> README.md

markdown-toc -i README.md

