#Doctrine, Symfony & the Database
##Chapter 2
```docker-compose up -d```

##Chapter 3
```docker-compose ps```

```docker-compose down``` (note: destroys the data!)

```mysql -u root --password=password --host=127.0.0.1 --port=55000```

or better:

```docker-compose exec database mysql -u root --password=password```

##Chapter 4
```symfony var:export --multiline```

##Chapter 7

```symfony console make:migration```

```symfony console doctrine:migrations:migrate```

