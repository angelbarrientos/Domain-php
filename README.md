## Developers guide

### Contribution guidelines ###

Please consider read about some concepts like OOP, [AOP], MVC, Patterns design, DDD, TDD,
mutant Testing, PSR1, PSR2, etc.
 
This project has been provided with several tools for ensure the code quality:

* [PHP Code Sniffer]
* [PHP Mess Detector]
* [PHP CS Fixer]
```bash
vendor/bin/phpcbf --standard=PSR1 src/ tests/
vendor/bin/phpcbf --standard=PSR2 src/ tests/
vendor/bin/phpcbf --standard=PSR12 src/ tests/

vendor/bin/phpmd src/ xml codesize controversial design naming unusedcode --exclude=vendor/
vendor/bin/phpmd tests/ xml codesize controversial design naming unusedcode --exclude=vendor/

vendor/bin/php-cs-fixer fix src/ --dry-run --diff
```

* [PHPMetrics]
* [PHPLoc]
* [PHPStan]
```bash
vendor/bin/phploc src
vendor/bin/phpmetrics --report-html=report/metrics ./
vendor/bin/phpstan analyse -l 7 src tests
```

* [PHPUnit]
```bash
vendor/bin/phpunit -c phpunit.xml
```

[PHP Code Sniffer]:https://github.com/squizlabs/PHP_CodeSniffer/wiki
[PHP Mess Detector]:https://phpmd.org/
[PHP CS Fixer]:https://github.com/FriendsOfPHP/PHP-CS-Fixer
[PHPMetrics]:https://phpmetrics.org/
[PHPLoc]:https://github.com/sebastianbergmann/phploc
[PHPStan]:https://github.com/phpstan/phpstan
[PHPUnit]:https://phpunit.readthedocs.io/es/latest/index.html
[AOP]:https://en.wikipedia.org/wiki/Aspect-oriented_programming
