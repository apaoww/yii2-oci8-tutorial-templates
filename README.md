# Yii2 Advanced Template Using OCI8

Yii2 Advance Templates Using OCI8 yii2-oci8 extension tutorial templates.

## Getting Started

These instructions will get you a copy of the Yii2 Advance Template using yii2-oci8 extension with installation instruction to get oci8 working on linux/window

### Prerequisites

1 - php
2 - oracle database
3 - Operating system linux or window
4 - oci8 php module
5 - oracle instance client download from oracle (http://www.oracle.com/technetwork/database/features/instant-client/index-097480.html)


### Installing


1 - Clone the template
```
git clone https://github.com/apaoww/yii2-oci8-tutorial-templates.git
```

2 - Install using composer
```
composer install
```
Select the environment and type yes for all


## Configure the oracle connection

To configure the oracle connection you have to follow the example provided on the file common/config/main-local.php

```
return [
    'components' => [
        'db' => [
            'class' => 'apaoww\oci8\Oci8DbConnection',
            'dsn' => 'oci8:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SID=xe)));charset=AL32UTF8;',
            'username' => 'youroracledatabaseschema',
            'password' => 'youroracleschemapassword',
            'attributes' => []
        ],
        //...other component
    ],
    //other configuration
];
```
3 - Run user table migration to use login function and employee table for sample
```
yii migrate
```



