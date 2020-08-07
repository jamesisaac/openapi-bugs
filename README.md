# API Platform OpenAPI bug reproduction

## Setup

```bash
$ composer install

$ bin/console doctrine:database:create
$ bin/console doctrine:schema:create
$ bin/console doctrine:fixtures:load

$ symfony server:start
```

Then visit http://localhost:8000