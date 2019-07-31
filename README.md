# Yii2-audit-logs

Auditlogs is a Audit trail + Logs management module that records all transactions and every movement of a registered user on your website.


### 1. Download

Add this to composer.json
```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/JayMar0526/yii2-audit-log.git"
        }
 ]

```
Add these to **composer.json** to allow http connections
```
"config": {
        "secure-http":false
    },
```

Yii2-audit-log can be installed using composer. Run following command to download and
install Yii2-audit-log:

```bash

composer require "jaymar0526/yii2-audit-log:master"
```

### 2. Configure

Add following lines to your main configuration file:

```php
'modules' => [
    'auditlogs' => [
        'class' => 'jaymar0526\auditlogs\Module',
    ],
],
```

### 3. Update database schema

The last thing you need to do is updating your database schema by applying the
migrations. Make sure that you have properly configured `db` application component
and run the following command:

```bash
$ php yii migrate/up --migrationPath=@vendor/jaymar0526/yii2-audit-log/migrations
```


### 4. Extend the Provided Classes on the controllers and models you wish to have an Audit Trail or Tracking

## Controller
```
use jaymar0526\auditlogs\classes\ControllerAudit;

class ProjectsController extends ControllerAudit 
{
...
}
```
## Models
```
use jaymar0526\auditlogs\classes\ModelAudit;

class Project extends  ModelAudit //\yii\db\ActiveRecord
{
...
}
```


### 5. Enjoy!!!