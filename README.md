# API tester

### Requirements
* php version >= 7.2 + cURL

### How it works?
1. Create test class in `app/Tests` directory, extending TestAbstract
2. Add config file for test in `config` directory
3. Add data about test for main config `config/tests.php`
4. Run command `php api-test.php -- testName` inside `api-tester` directory

