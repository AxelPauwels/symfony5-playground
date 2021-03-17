# run server
```symfony serve -d ```
or
```symfony server:start```

#Chapter info
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



