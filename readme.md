# SamplerChallenge Assignment

## Setup
Make sure to first run `composer install`. 

## Tests
In order to run the tests please run `vendor/bin/phpunit`. If for some reason there is a problem with class loading please run `composer dumpautoload -o`. 

## Usage 
To use the random string generator option just run the `sampler.php` script with no options.
```
$ php sampler.php
```

To use the external www.random.org api please run the script with the flag `-e` or `--external`.
```
$ php sampler.php -e
```

To pipe input into the script please run the following command.
```
$ cat input.txt | php sampler.php 
```


