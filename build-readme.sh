#!/bin/sh

cat intro.md > README.md

./bin/markdown-docs generate --public --md 'diversen\markdownDocs' >> README.md

markdown-toc -i README.md

