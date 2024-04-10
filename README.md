### MYSQL Digestor
This program handles massive dumps.
Just flush your shit.

Version: 0.0.1
Author: Sandro Schutt Jr
Author URI: https://github.com/sandroschutt

#### Tested on
System: Linux Mint 21.1 Vera
Browsers: [Chrome, FireFox]

#### Features
 - Slice .sql files in minor files;
 - Every query is transformed into a new .sql file;
 - Results are stored in /final/file/;

May require increase of PHP memory limit variable.

#### Requires
 - apache2 [on]
 - mysql-server [on]

#### Configuration
 1. Start your localhost apache and mysql server
 2. Create a new database
 3. Set connection variables in conn.php

#### Run:
```
    ~$ cd sql-digestor/src
```
##### To split a big dump in little dumplings:

```
    ~$ php mysql-digestor-split.php
```
##### To upload all dumplings to your database:

```
    ~$ php mysql-digestor-upload.php
```


You also can access this program from your browser in case these files are inside a public_html or htdocs folder.


> http://localhost/sql-digestor


This way, you have the same status feedback as a linux terminal.
