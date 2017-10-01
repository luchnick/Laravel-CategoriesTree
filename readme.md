DB contains 13 categories (with subCategories in each), 10000 products

DB dump see in storage/dump.sql
Solutions see in storage/solutions.sql

DB tree method - *Closure Table* (Query Child - Easy, Query Subtree - Easy, Modify Tree - Easy, Referential Integrity - Yes)

For create new DB and fill it - 

```
php artisan migrate

php artisan migrate:refresh --seed
```

For test optimization we used EXPLAIN MYSQL command.

A good method for evaluating performance is to multiply all the numbers in the "rows" column.

The result is approximately proportional to the amount of data you are working on.

a) rows - 26 * 1 * 1 = 26;

b) rows - 4 * 261 * 1 * 1 = 1044;

c) rows - 4 * 261 * 1 * 1 = 1044;

d) rows - 4 * 261 * 1 = 1044;

e) rows - 4 * 1 * 1 = 4;