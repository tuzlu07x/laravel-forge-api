# Laravel Forge API Client

<p>
This is a PHP client library for interacting with the Laravel Forge API. It provides a convenient way to manage various aspects of your Laravel Forge server, such as backups, credentials, databases, deployments, firewall rules, Git configurations, monitoring, MySQL databases, MySQL users, Nginx templates, and more.
</p>

## Installation

Install this package via Composer:

```
composer require ftuzlu/forge-api
```

## Usage

### Initialize the Forge Client

```php
use Fatihtuzlu\ForgeAPI\Forge;

$forge = new Forge('YOUR_BEARER_TOKEN');
```

Replace `YOUR_BEARER_TOKEN` with your actual Forge API Bearer Token.

## User

```php
use Fatihtuzlu\ForgeAPI\User;

// Show user details
$user = new User($forge);
$userDetails = $user->show();
```

The `User` class provides a method to retrieve details about the authenticated user. You can use it to obtain information such as user account details, subscription status, or any other relevant user-specific information.

## Server

```php
use Fatihtuzlu\ForgeAPI\Server;

// Create Server
$server = new Server($forge);
$createdServer = $server->create($options);

$servers = $server->list();

$serverId = 1;
$specificServer = $server->get($serverId);

$updatedServer = $server->update($serverId, $options);

$server->delete($serverId);
```

## Service

The `Service` class is designed to handle HTTP requests to the Forge API. It extends the `ServiceAbstract` class, which provides a basic structure for handling API requests.

### Service Class

#### Constructor

```php
use Fatihtuzlu\ForgeAPI\Service;

// Instantiate the Service class
$service = new Service($forge);

// Example: Sending a GET request
$response = $service->sendReq('/api/v1/some-endpoint', 'GET');
```

## Firewall

```php
use Fatihtuzlu\ForgeAPI\Firewall;

$firewall = new Firewall($forge);

// Create a new firewall rule
$newFirewallRule = $firewall->create($serverId, $options);

// List firewall rules
$firewallRules = $firewall->list($serverId);

// Get details of a specific firewall rule
$firewallRuleDetails = $firewall->get($serverId, $ruleId);

// Delete a firewall rule
$firewall->delete($serverId, $ruleId);
```

## ScheduledJob

The `ScheduledJob` class provides methods to manage scheduled jobs on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\ScheduledJob;
use Fatihtuzlu\ForgeAPI\ScheduledJob;

// Instantiate the ScheduledJob class by providing an instance of the Forge class
$scheduledJob = new ScheduledJob($forge);

// Example: Creating a new scheduled job
$options = [
    'command' => 'php artisan my:command',
    'user' => 'forge',
    'frequency' => 'daily',
    'hour' => 3,
    'minute' => 30,
];

$response = $scheduledJob->create($serverId, $options);

// Example: Listing all scheduled jobs on a server
$jobs = $scheduledJob->list($serverId);

// Example: Getting details of a specific scheduled job
$jobId = 123; // Replace with the actual job ID
$jobDetails = $scheduledJob->get($serverId, $jobId);

// Example: Deleting a scheduled job
$jobId = 123; // Replace with the actual job ID
$scheduledJob->delete($serverId, $jobId);
```

## PHP

The `PHP` class provides methods to manage PHP configurations on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\PHP;

// Instantiate the PHP class by providing an instance of the Forge class
$php = new PHP($forge);

// Example: Listing PHP versions on a server
$phpVersions = $php->list($serverId);

// Example: Installing a PHP version
$options = [
    'version' => 'php80', // Replace with the desired PHP version
];

$response = $php->install($serverId, $options);

// Example: Upgrading PHP version
$options = [
    'version' => 'php74', // Replace with the desired PHP version for upgrade
];

$response = $php->upgrade($serverId, $options);

// Example: Enabling OPcache for PHP
$response = $php->enable($serverId);

// Example: Disabling OPcache for PHP
$php->disable($serverId);
```

## Database

```php
use Fatihtuzlu\ForgeAPI\Database;

$database = new Database($forge);

// List databases
$databases = $database->list($serverId);

// Create a new database
$newDatabase = $database->create($serverId, $options);

// Get details of a specific database
$databaseDetails = $database->get($serverId, $databaseId);

// Sync databases
$database->sync($serverId);

// Delete a database
$database->delete($serverId, $databaseId);
```

## MySQL Database

The `MysqlDatabase` class provides methods to manage MySQL databases on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\MysqlDatabase;

// Instantiate the MysqlDatabase class by providing an instance of the Forge class
$mysqlDatabase = new MysqlDatabase($forge);

// Example: Listing MySQL databases on a server
$databases = $mysqlDatabase->list($serverId);

// Example: Creating a new MySQL database
$options = [
    'name' => 'example_database', // Replace with the desired database name
];

$response = $mysqlDatabase->create($serverId, $options);

// Example: Getting details of a MySQL database
$databaseId = 123; // Replace with the desired database ID
$databaseDetails = $mysqlDatabase->get($serverId, $databaseId);

// Example: Deleting a MySQL database
$databaseId = 123; // Replace with the desired database ID
$mysqlDatabase->delete($serverId, $databaseId);
```

## MySQL Database User

The `MysqlDatabaseUser` class provides methods to manage MySQL database users on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\MysqlDatabaseUser;

// Instantiate the MysqlDatabaseUser class by providing an instance of the Forge class
$mysqlDatabaseUser = new MysqlDatabaseUser($forge);

// Example: Listing MySQL database users on a server
$users = $mysqlDatabaseUser->list($serverId);

// Example: Creating a new MySQL database user
$options = [
    'name'     => 'example_user', // Replace with the desired username
    'password' => 'secure_password', // Replace with the desired password
];

$response = $mysqlDatabaseUser->create($serverId, $options);

// Example: Getting details of a MySQL database user
$userId = 123; // Replace with the desired user ID
$userDetails = $mysqlDatabaseUser->get($serverId, $userId);

// Example: Updating details of a MySQL database user
$userId = 123; // Replace with the desired user ID
$options = [
    'password' => 'new_secure_password', // Replace with the desired new password
];

$response = $mysqlDatabaseUser->update($serverId, $userId, $options);

// Example: Deleting a MySQL database user
$userId = 123; // Replace with the desired user ID
$mysqlDatabaseUser->delete($serverId, $userId);
```

## Nginx

The `Nginx` class provides methods to manage Nginx templates on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\Nginx;

// Instantiate the Nginx class by providing an instance of the Forge class
$nginx = new Nginx($forge);

// Example: Listing the default Nginx template on a server
$template = $nginx->list($serverId);

// Example: Creating a new Nginx template
$options = [
    'content' => '...nginx configuration content...', // Replace with the desired Nginx configuration content
];

$response = $nginx->create($serverId, $options);

// Example: Getting details of the default Nginx template
$templateId = 1; // Replace with the default template ID
$templateDetails = $nginx->getDefault($serverId, $templateId);

// Example: Getting details of a specific Nginx template
$templateId = 123; // Replace with the desired template ID
$templateDetails = $nginx->get($serverId, $templateId);

// Example: Updating details of a specific Nginx template
$templateId = 123; // Replace with the desired template ID
$options = [
    'content' => '...updated nginx configuration content...', // Replace with the desired updated Nginx configuration content
];

$response = $nginx->update($serverId, $templateId, $options);

// Example: Deleting a specific Nginx template
$templateId = 123; // Replace with the desired template ID
$nginx->delete($serverId, $templateId);
```

## Site

The `Site` class provides methods to manage sites on a Forge server.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\Site;

// Instantiate the Site class by providing an instance of the Forge class
$site = new Site($forge);

// Example: Listing all sites on a server
$sites = $site->list($serverId);

// Example: Creating a new site
$options = [
    'domain' => 'example.com', // Replace with the desired domain
    // ... other site configuration options
];

$response = $site->create($serverId, $options);

// Example: Getting details of a specific site
$siteId = 123; // Replace with the desired site ID
$siteDetails = $site->get($serverId, $siteId);

// Example: Updating details of a specific site
$siteId = 123; // Replace with the desired site ID
$options = [
    'domain' => 'updated-example.com', // Replace with the updated domain
    // ... other updated site configuration options
];

$response = $site->update($serverId, $siteId, $options);

// Example: Deleting a specific site
$siteId = 123; // Replace with the desired site ID
$site->delete($serverId, $siteId);

// Example: Changing PHP version for a specific site
$siteId = 123; // Replace with the desired site ID
$options = [
    'version' => 'php8.0', // Replace with the desired PHP version
];

$site->changePhpVersion($serverId, $siteId, $options);

// Example: Adding aliases to a specific site
$siteId = 123; // Replace with the desired site ID
$options = [
    'aliases' => ['alias1.com', 'alias2.com'], // Replace with the desired aliases
];

$aliases = $site->addAliases($serverId, $siteId, $options);

// Example: Retrieving load balancing details for a specific site
$siteId = 123; // Replace with the desired site ID
$balancingDetails = $site->loadBalancing($serverId, $siteId);

// Example: Updating load balancing details for a specific site
$siteId = 123; // Replace with the desired site ID
$options = [
    'mode' => 'http', // Replace with the desired load balancing mode
    // ... other updated load balancing options
];

$site->updateLoadBalancing($serverId, $siteId, $options);

// Example: Retrieving logs for a specific site
$siteId = 123; // Replace with the desired site ID
$siteLogs = $site->log($serverId, $siteId);
```

## SSLCertificate

The `SSLCertificate` class provides methods to manage SSL certificates for sites on a Forge server.

### Constructor

```php
// Instantiate the SSLCertificate class by providing an instance of the Forge class
$sslCertificate = new SSLCertificate($forge);

// Example: Installing an existing SSL certificate
$serverId = 123;
$siteId = 456;
$options = [
    'certificate' => '-----BEGIN CERTIFICATE----- ... -----END CERTIFICATE-----',
    'private_key' => '-----BEGIN PRIVATE KEY----- ... -----END PRIVATE KEY-----',
    // ... other certificate installation options
];

$response = $sslCertificate->installAnExisting($serverId, $siteId, $options);

// Example: Cloning an existing SSL certificate
$serverId = 123;
$siteId = 456;
$options = [
    'certificate_id' => 789,
    // ... other certificate cloning options
];

$response = $sslCertificate->cloneAnExisting($serverId, $siteId, $options);

// Example: Installing Let's Encrypt SSL certificate
$serverId = 123;
$siteId = 456;
$options = [
    'subdomains' => ['www'],
    // ... other Let's Encrypt certificate installation options
];

$response = $sslCertificate->letsencrypt($serverId, $siteId, $options);

// Example: Listing SSL certificates for a specific site
$serverId = 123;
$siteId = 456;
$certificates = $sslCertificate->list($serverId, $siteId);

// Example: Getting details of a specific SSL certificate
$serverId = 123;
$siteId = 456;
$certificateId = 789;
$certificateDetails = $sslCertificate->get($serverId, $siteId, $certificateId);

// Example: Retrieving the signing request for a specific SSL certificate
$serverId = 123;
$siteId = 456;
$certificateId = 789;
$sslCertificate->getSigninReq($serverId, $siteId, $certificateId);

// Example: Installing a specific SSL certificate
$serverId = 123;
$siteId = 456;
$certificateId = 789;
$options = [
    'private_key' => '-----BEGIN PRIVATE KEY----- ... -----END PRIVATE KEY-----',
    // ... other certificate installation options
];

$sslCertificate->install($serverId, $siteId, $certificateId, $options);

// Example: Activating a specific SSL certificate
$serverId = 123;
$siteId = 456;
$certificateId = 789;
$sslCertificate->activate($serverId, $siteId, $certificateId);

// Example: Deleting a specific SSL certificate
$serverId = 123;
$siteId = 456;
$certificateId = 789;
$sslCertificate->delete($serverId, $siteId, $certificateId);
```

## SSHKey

The `SSHKey` class provides methods to manage SSH keys for servers on Forge.

### Constructor

```php
// Instantiate the SSHKey class by providing an instance of the Forge class
$sshKey = new SSHKey($forge);

// Example: Creating a new SSH key for a server
$serverId = 123;
$newSSHKey = $sshKey->create($serverId);

// Example: Listing all SSH keys for a server
$serverId = 123;
$sshKeys = $sshKey->list($serverId);

// Example: Getting details of a specific SSH key
$serverId = 123;
$keyId = 456;
$keyDetails = $sshKey->get($serverId, $keyId);

// Example: Deleting a specific SSH key
$serverId = 123;
$keyId = 456;
$sshKey->delete($serverId, $keyId);
```

## Worker

The `Worker` class provides methods to manage workers for sites on Forge.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\Worker;

// Instantiate the Worker class by providing an instance of the Forge class
// Instantiate the Worker class by providing an instance of the Forge class
$worker = new Worker($forge);

// Example: Adding a new worker to a site
$serverId = 123;
$siteId = 456;
$options = [
    'command' => 'php artisan queue:work',
    'queue' => 'default',
    // Add other options as needed
];
$newWorker = $worker->create($serverId, $siteId, $options);

// Example: Listing all workers for a site
$serverId = 123;
$siteId = 456;
$workers = $worker->list($serverId, $siteId);

// Example: Getting details of a specific worker
$serverId = 123;
$siteId = 456;
$workerId = 789;
$workerDetails = $worker->get($serverId, $siteId, $workerId);

// Example: Deleting a specific worker
$serverId = 123;
$siteId = 456;
$workerId = 789;
$worker->delete($serverId, $siteId, $workerId);

// Example: Restarting a specific worker
$serverId = 123;
$siteId = 456;
$workerId = 789;
$worker->restart($serverId, $siteId, $workerId);
```

## SecurityRule

The `SecurityRule` class provides methods to manage security rules for sites on Forge.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\SecurityRule;

// Instantiate the SecurityRule class by providing an instance of the Forge class
$securityRule = new SecurityRule($forge);

// Example: Adding a new security rule to a site
$serverId = 123; // Replace with the desired server ID
$siteId = 456; // Replace with the desired site ID
$options = [
    "name" => "Access Restricted",
    "path" => null,
    "credentials" => [
        [
            "username" => "taylor.otwell",
            "password" => "password123",
        ],
        [
            "username" => "james.brooks",
            "password" => "secret123",
        ],
    ],
    // Add other options as needed
];
$newRule = $securityRule->create($serverId, $siteId, $options);

// Example: Listing all security rules for a site
$serverId = 123;
$siteId = 456;
$rules = $securityRule->list($serverId, $siteId);

// Example: Getting details of a specific security rule
$serverId = 123;
$siteId = 456;
$ruleId = 789;
$ruleDetails = $securityRule->get($serverId, $siteId, $ruleId);

// Example: Deleting a specific security rule
$serverId = 123;
$siteId = 456;
$ruleId = 789;
$securityRule->delete($serverId, $siteId, $ruleId);
```

## Deployment

The `Deployment` class provides methods to manage deployment settings and actions for sites on Forge.

### Constructor

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Deployment;

// Instantiate the Forge class (assuming you have set up your API key and other necessary configurations)
$forge = new Forge('your-api-key', 'your-api-url');

// Instantiate the Deployment class
$deployment = new Deployment($forge);

// Example: Enable deployment for a site
$serverId = 123; // Replace with the desired server ID
$siteId = 456; // Replace with the desired site ID
$deployment->enable($serverId, $siteId);

// Example: Get the deployment script for a site
$deploymentScript = $deployment->get($serverId, $siteId);
print_r($deploymentScript);

// Example: Update the deployment script for a site
$options = [
    "content" => "Updated content of the deployment script",
    "auto_source" => true,
    // Add other options as needed
];
$deployment->update($serverId, $siteId, $options);

// Example: Deploy a site
$deployment->deploy($serverId, $siteId);

// Example: Reset deployment for a site
$deployment->reset($serverId, $siteId);

// Example: Get the deployment log for a site
$deploymentLog = $deployment->log($serverId, $siteId);
print_r($deploymentLog);

// Example: Disable deployment for a site
$deployment->disable($serverId, $siteId);
```

## Deployment History

The `DeploymentHistory` class in the Forge API wrapper allows you to interact with deployment history for a specific site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\DeploymentHistory;

// Instantiate the Forge class (assuming you have set up your API key and other necessary configurations)
$forge = new Forge('your-api-key', 'your-api-url');

// Instantiate the DeploymentHistory class
$deploymentHistory = new DeploymentHistory($forge);

// Example: List deployment history for a site
$serverId = 123; // Replace with the desired server ID
$siteId = 456; // Replace with the desired site ID
$deployments = $deploymentHistory->list($serverId, $siteId);
print_r($deployments);

// Example: Get details of a specific deployment in history
$deploymentId = 789; // Replace with the desired deployment ID
$deploymentDetails = $deploymentHistory->get($serverId, $siteId, $deploymentId);
print_r($deploymentDetails);

// Example: Get output of a specific deployment in history
$deploymentOutput = $deploymentHistory->getOutput($serverId, $siteId, $deploymentId);
print_r($deploymentOutput);
```

## NginxConfiguration

The `NginxConfiguration` class in the Forge API wrapper provides methods to manage Nginx configuration and environment variables for a specific site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\NginxConfiguration;

$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the NginxConfiguration class
$nginxConfig = new NginxConfiguration($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// Get Nginx configuration for the site
$nginxConfiguration = $nginxConfig->get($serverId, $siteId);
print_r($nginxConfiguration);

// Replace with the desired options for Nginx configuration
$options = [
    // Your Nginx configuration options here
];

// Update Nginx configuration for the site
$updatedNginxConfig = $nginxConfig->update($serverId, $siteId, $options);
print_r($updatedNginxConfig);

// Get environment variables for the site
$envVariables = $nginxConfig->getEnv($serverId, $siteId);
print_r($envVariables);

// Replace with the desired options for updating environment variables
$envOptions = [
    // Your environment variable options here
];

// Update environment variables for the site
$updatedEnvVariables = $nginxConfig->updateEnv($serverId, $siteId, $envOptions);
print_r($updatedEnvVariables);
```

## Git

The `Git` class in the Forge API wrapper provides methods to manage Git configurations, deployments, and deploy keys for a specific site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Git;

$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Git class
$git = new Git($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// Replace with the desired options for Git installation
$installOptions = [
    // Your Git installation options here
];

// Install Git for the site
$gitInstallation = $git->install($serverId, $siteId, $installOptions);
print_r($gitInstallation);
```

## SiteCommand

The `SiteCommand` class in the Forge API wrapper provides methods to execute commands, list executed commands, and get details about a specific executed command for a site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\SiteCommand;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the SiteCommand class
$siteCommand = new SiteCommand($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// 1. Execute a Command for the Site
// Replace with the desired options for the command execution
$executionOptions = [
    'command' => 'php artisan migrate',
    'script' => 'YOUR_CUSTOM_SCRIPT', // Optional
    // Additional options as needed
];

$commandExecution = $siteCommand->execute($serverId, $siteId, $executionOptions);
print_r($commandExecution);

// 2. List Executed Commands for the Site
$executedCommands = $siteCommand->list($serverId, $siteId);
print_r($executedCommands);

// 3. Get Details of a Specific Executed Command
// Replace with the desired command ID
$commandId = 789;

$commandDetails = $siteCommand->get($serverId, $siteId, $commandId);
print_r($commandDetails);
```

## Wordpress

The `Wordpress` class in the Forge API wrapper provides methods to install and uninstall `WordPress` for a site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Wordpress;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Wordpress class
$wordpress = new Wordpress($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// 1. Install WordPress for the Site
// Replace with the desired options for WordPress installation
$installOptions = [
    "database"=> "forge",
    "user"=> 1
];

$wordpress->install($serverId, $siteId, $installOptions);

// 2. Uninstall WordPress for the Site
$wordpress->uninstall($serverId, $siteId);
```

## PhpMyAdmin

The `PhpMyAdmin` class in the Forge API wrapper provides methods to install and uninstall `PhpMyAdmin` for a site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\PhpMyAdmin;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the PhpMyAdmin class
$phpMyAdmin = new PhpMyAdmin($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// 1. Install PhpMyAdmin for the Site
// Replace with the desired options for PhpMyAdmin installation
$installOptions = [
    "database" => "forge",
    "user" => 1
];

$phpMyAdmin->install($serverId, $siteId, $installOptions);

// 2. Uninstall PhpMyAdmin for the Site
$phpMyAdmin->uninstall($serverId, $siteId);
```

## Webhook

The `Webhook` class in the Forge API wrapper provides methods to manage webhooks for a site on a Forge server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Webhook;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Webhook class
$webhook = new Webhook($forge);

// Replace with the desired server and site IDs
$serverId = 123;
$siteId = 456;

// 1. List Webhooks for the Site
$webhooks = $webhook->list($serverId, $siteId);
print_r($webhooks);

// 2. Show Details of a Webhook
// Replace with the desired webhook ID
$webhookId = 789;
$webhookDetails = $webhook->show($serverId, $siteId, $webhookId);
print_r($webhookDetails);

// 3. Create a New Webhook
// Replace with the desired options for webhook creation
$createOptions = [
     "url" => "http://domain.com"
];

$newWebhook = $webhook->create($serverId, $siteId, $createOptions);
print_r($newWebhook);

// 4. Delete a Webhook
// Replace with the desired webhook ID to be deleted
$webhookIdToDelete = 789;
$deletedWebhook = $webhook->delete($serverId, $siteId, $webhookIdToDelete);
print_r($deletedWebhook);
```

## Recipe

The `Recipe` class in the Forge API wrapper provides methods to manage recipes.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Recipe;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Recipe class
$recipe = new Recipe($forge);

// 1. List Recipes
$recipes = $recipe->list();
print_r($recipes);

// 2. Create a New Recipe
// Replace with the desired options for recipe creation
$createOptions = [
    'name' => 'Example Recipe',
    'script' => '#!/bin/bash
echo "Hello, Forge!"',
    // Additional options as needed
];

$newRecipe = $recipe->create($createOptions);
print_r($newRecipe);

// 3. Get Details of a Recipe
// Replace with the desired recipe ID
$recipeId = 123;
$recipeDetails = $recipe->get($recipeId);
print_r($recipeDetails);

// 4. Update a Recipe
// Replace with the desired recipe ID and options for updating
$recipeIdToUpdate = 123;
$updateOptions = [
    'name' => 'Updated Recipe',
    'script' => '#!/bin/bash
echo "Updated Forge Recipe!"',
    // Additional options as needed
];

$updatedRecipe = $recipe->update($recipeIdToUpdate, $updateOptions);
print_r($updatedRecipe);

// 5. Delete a Recipe
// Replace with the desired recipe ID to be deleted
$recipeIdToDelete = 123;
$recipe->delete($recipeIdToDelete);
echo "Recipe deleted successfully.\n";

// 6. Run a Recipe
// Replace with the desired recipe ID and options for running
$recipeIdToRun = 123;
$runOptions = [
    'servers' => [456, 789], // Server IDs to run the recipe on
    // Additional options as needed
];

$recipe->run($recipeIdToRun, $runOptions);
echo "Recipe execution initiated.\n";
```

## Region

The `Region` class in the Forge API wrapper provides a method to retrieve a list of available regions.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Region;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Region class
$region = new Region($forge);

// List Available Regions
$regions = $region->list();
print_r($regions);
```

## Credential

The `Credential` class in the Forge API wrapper provides a method to retrieve a list of available credentials.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Credential;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Credential class
$credential = new Credential($forge);

// List Available Credentials
$credentials = $credential->list();
print_r($credentials);
```

## Backup

The `Backup` class in the Forge API wrapper provides methods for managing backup configurations on a server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Backup;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Backup class
$backup = new Backup($forge);

// List Backup Configurations for a Server
$serverId = 123; // Replace with your server ID
$backupConfigurations = $backup->list($serverId);
print_r($backupConfigurations);

// Create a Backup Configuration
$backupOptions = [
   "provider" => "spaces",
    "credentials" => [
        "endpoint" => "https://my-endpoint.com",
        "region" => "region-key",
        "bucket" => "bucket-name",
        "access_key" => "",
        "secret_key" => ""
    ],
    "frequency" => [
        "type" => "weekly",
        "time" => "12:30",
        "day" => 1
    ],
    "directory" => "backups/server/db",
    "email" => "forge@laravel.com",
    "retention" => 7,
    "databases" => [
        24
    ]
];
$newBackup = $backup->create($serverId, $backupOptions);
print_r($newBackup);

// Get Backup Configuration Details
$backupConfigurationId = 456; // Replace with the actual backup configuration ID
$backupDetails = $backup->get($serverId, $backupConfigurationId);
print_r($backupDetails);

// Run a Backup for a Backup Configuration
$backup->run($serverId, $backupConfigurationId);

// Delete Backup Configuration
$backup->deleteBackupConfigiration($serverId, $backupConfigurationId);

// Restore from Backup
$backupId = 789; // Replace with the actual backup ID
$backup->restore($serverId, $backupConfigurationId, $backupId);

// Delete Backup
$backup->deleteBackup($serverId, $backupConfigurationId, $backupId);
```

## Monitoring

The `Monitoring` class in the Forge API wrapper provides methods for managing monitors on a server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\Monitoring;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the Monitoring class
$monitoring = new Monitoring($forge);

// List Monitors for a Server
$serverId = 123; // Replace with your server ID
$monitors = $monitoring->list($serverId);
print_r($monitors);

// Create a Monitor
$monitorOptions = [
    "type" => "cpu_load",
    "operator" => "gte",
    "threshold" => "1.3",
    "minutes" => "5",
    "notify" => "forge@laravel.com"
];
$newMonitor = $monitoring->create($serverId, $monitorOptions);
print_r($newMonitor);

// Get Monitor Details
$monitorId = 456; // Replace with the actual monitor ID
$monitorDetails = $monitoring->get($serverId, $monitorId);
print_r($monitorDetails);

// Delete a Monitor
$monitoring->delete($serverId, $monitorId);
```

## ServerLogs

The `ServerLogs` class in the Forge API wrapper provides a method for retrieving logs for a specific server.

```php
use Fatihtuzlu\ForgeAPI\Forge;
use Fatihtuzlu\ForgeAPI\ServerLogs;

// Instantiate the Forge class with your Bearer token
$forge = new Forge('YOUR_BEARER_TOKEN');

// Instantiate the ServerLogs class
$serverLogs = new ServerLogs($forge);

// Retrieve Logs for a Server
$serverId = 123; // Replace with your server ID
$logs = $serverLogs->logs($serverId);

if (!empty($logs)) {
    // Process and display logs
    foreach ($logs as $log) {
        echo "Log Entry:\n";
        echo "Timestamp: " . $log['timestamp'] . "\n";
        echo "Message: " . $log['message'] . "\n\n";
    }
} else {
    echo "No logs available for the specified server.\n";
}
```
