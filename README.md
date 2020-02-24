# API tester

### Requirements
* php version >= 7.2 + cURL

### How it works?
1. Add config file for test in `config` directory.
   Example: `config/web-backend-course/level1.php`
   ``` 
   <?php
    
   return [
     'domain' => 'localhost',
     'endpoints' => [
       'updateSomething' => '/something/:somethingId/update'
     ],
     'pathToCookie' => '/tmp/cookie.txt'
   ];
   ```

2. Create test class in `app/Tests` directory, extending TestAbstract. 
   Example: `app/Tests/WebBackendCourse/TestLevel1`
   ```
   <?php
   
   namespace app\Tests\WebBackendCourse;

   use app\Contracts\ClientInterface;  
   use app\Contracts\TesterConfigInterface;
   
   class TestLevel1 extends TestAbstract
   {
       private $client;
       private $config;
       
       public function __construct(ClientInterface $client, TesterConfigInterface)
       {
           $this->client = $client;
           $this->config = $config;
       }
       
       public function run()
       {
           $this->testSomething();
       }
       
       private function testSomething()
       {
           // todo implements
       }
   }
   ```
   
   
3. Add data about test for main config `config/tests.php`
   Example:
   ```
   <?php
   
   return [
       'web-backend-level1' => [
          'tester' => \app\Tests\WebBackendCourse\TestLevel1::class,
          'config' => \\ path to level1 config file
       ],
   ];
   ```

4. Run command `php api-test.php -- testName` inside `api-tester` directory

