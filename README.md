SquirrelLookout
===============


## Quick test

```sh
cd php
gzcat ../samples/dev-ferret-db1.log.gz | ./main.php  
```

Generate signatures
```sh
gzcat ../samples/dev-ferret-db1.log.gz | ./main.php | tee ../samples/dev-ferret-db1.sig.log

## 
gzcat ../samples/db217-general_log.gz | head -10000 | ./main.php | tee ../samples/db217-general.sig.log

```

Generate statistics
```sh
sort ../samples/dev-ferret-db1.sig.log | uniq -c | sort | tee ../samples/dev-ferret-db1.sig.count.log

##
sort ../samples/db217-general.sig.log | uniq -c | sort | tee ../samples/db217-general.sig.count.log

```
