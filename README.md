# phpBB 3.1 Extension - Acme Demo

## Installation

Clone into phpBB/ext/acme/demo:

    git clone https://github.com/phpbb/phpbb-ext-acme-demo.git phpBB/ext/acme/demo

Go to "ACP" > "Customise" > "Extensions" and enable the "Acme Demo Extension" extension.

## Tests and Continuous Integration

We use GitHub Actions and PHPUnit for our unit testing. See more information on the [phpBB development wiki](https://wiki.phpbb.com/Unit_Tests).

[![Tests](https://github.com/phpbb/phpbb-ext-acme-demo/actions/workflows/tests.yml/badge.svg)](https://github.com/phpbb/phpbb-ext-acme-demo/actions/workflows/tests.yml)

To run the tests locally, you need to install phpBB from its Git repository. Afterwards run the following command from the phpBB Git repository's root:

Windows:

    phpBB\vendor\bin\phpunit.bat -c phpBB\ext\acme\demo\phpunit.xml.dist

others:

    phpBB/vendor/bin/phpunit -c phpBB/ext/acme/demo/phpunit.xml.dist

## License

[GPLv2](license.txt)
