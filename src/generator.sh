#! /bin/bash
cat $1 | php index.php > data.txt
python tokenProcessing.py data.txt > duplicateTokens.txt
sort duplicateTokens.txt | uniq -c | sort -n > uniqueTokens.txt
rm -f data.txt duplicateTokens.txt

