# run server
```symfony serve -d ```
or
```symfony server:start```

#Symfony 5 Fundamentals
##Chapter 1
List the available Service-objects:

```./bin/console debug:autowiring```

"A bundle gives you services ("tools")"

##Chapter 2
```./bin/console debug:autowiring markdown```

-> nothing found: google for it

-> composer require ...

```./bin/console debug:autowiring markdown```
 
the blue text is the id

##Chapter 4

```./bin/console config:dump KnpMarkdownBundle```
```./bin/console config:dump TwigBundle```

##Chapter 5
All services lives in a service container.

The service container is like an array with id and object.

All services (not all can be autowired) (with the blue id and the object)

```./bin/console debug:container```

All autowire-able services

```./bin/console debug:autowiring```

##Chapter 6

```./bin/console config:dump FrameworkBundle```

```./bin/console config:dump FrameworkBundle cache```


```./bin/console debug:config FrameworkBundle cache```

##Chapter 7

```./bin/console debug:router```

##Chapter 8

(var/cache/prof)

```./bin/console cache:clear```

##Chapter 9

```./bin/console debug:autowiring Markdown```

```./bin/console debug:autowiring Markdown --all```

##Chapter 10

```./bin/console debug:container --parameters```

```./bin/console debug:container --parameters --env=dev```

```./bin/console debug:container --parameters --env=prod```

##Chapter 15
```./bin/console debug:autowiring log```

##Chapter 18
```./bin/console about```

##Chapter 19
```./bin/console secret:set SENTRY_DSN```

```./bin/console secret:set SENTRY_DSN --env=prod```

##Chapter 20
```./bin/console secret:list```

```./bin/console secret:list --reveal```

```./bin/console secret:list --env=prod```

```./bin/console secret:list --env=prod --reveal```
