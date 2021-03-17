# run server
```symfony serve -d ```
or
```symfony server:start```

#chapter 1
List the available Service-objects:

```./bin/console debug:autowiring```

"A bundle gives you services ("tools")"

#chapter 2
```./bin/console debug:autowiring markdown```

-> nothing found: google for it

-> composer require ...

```./bin/console debug:autowiring markdown```
 the blue text is the id

#chapter 2

```./bin/console config:dump KnpMarkdownBundle```
```./bin/console config:dump TwigBundle```

