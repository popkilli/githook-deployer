
# Github WebHook Deployer PHP Script

- This is PHP Github webhook deployer script to auto git pull source code on server.

- This webhook script can be used in Github, Bitbucket and Gitlab.

- Use deploy.example.php as working script. **E.g. deploy.myproject1.php**

- Setup a webhook URL and Public Key at Github, Bitbucket and Gitlab.

## Configuration in deploy.example.php

```php
define("TOKEN", ""); // generate by "openssl rand -base64 32"
define("REMOTE_REPOSITORY", "git@github.com:username/reponame.git"); // edit repo remote address
define("DIR", "/var/www/html/reponame"); // repo path
define("BRANCH", "main"); // branch name
define("LOGFILE", "/var/www/html/githook/logs/".date('YmdHis')."_reponame_deploy.log"); // log path
define("GIT", "/usr/bin/git");
define("MAX_EXECUTION_TIME", 180);
define("BEFORE_PULL", "");
define("AFTER_PULL", "");
```
## Webhook Deployer Test Script - deploy.tester.php
This script is to simulate the Github, Bitbucket and Gitlab payloads to hit our deployer script.

Get the payloads data on Github, Bitbucket and Gitlab and paste to variables below:-
```php
$data = '{"zen":"Non-blocking is better than blocking.","hook_id"...."site_admin":false}}'; //Start with "zen" until "site_admin"
$header = array('Accept: */*','Content-type: application/json','User-Agent: GitHub-Hookshot/ded62e5','X-GitHub-Delivery: 19d716f0-b0d2-11ec-8ceb-749330235434','X-GitHub-Event: ping','X-GitHub-Hook-ID: 350825890','X-GitHub-Hook-Installation-Target-ID: 428559037','X-GitHub-Hook-Installation-Target-Type: repository','X-Hub-Signature: sha1=32fadce637aac6a8aa6249e25a18e9b9c38ea296','X-Hub-Signature-256: sha256=128bd101b73742a8a54802ff169bfd9304b502ef368e98c4f1416de9269aa181');
$url = 'http://127.0.0.1/deploy.example.php';
```

## SSH Setup
On Ubuntu, Apache user is www-data. Create public key for user www-data (id_rsa.pub) at path /var/www/.ssh
```shell
sudo -u www-data ssh-keygen -t rsa
```
Add github.com RSA to /var/www/.ssh/known_hosts
```shell
sudo ssh-keyscan -t rsa github.com >> /var/www/.ssh/known_hosts
```
Add github.com RSA to /var/www/.ssh/known_hosts
```shell
sudo ssh-keyscan -t rsa github.com >> /var/www/.ssh/known_hosts
```
Make sure /var/www/.ssh is under www-data:www-data with 775 permission
```shell
ubuntu@localhost:/var/www$ pwd
/var/www
ubuntu@localhost:/var/www$ ls -la
total 16
drwxr-xr-x  4 root     root     4096 Mar 31 16:57 .
drwxr-xr-x 15 root     root     4096 Sep 23  2019 ..
drwxrwxr-x  2 www-data www-data 4096 Mar 31 17:03 .ssh
drwxr-xr-x  5 root     root     4096 Mar 31 08:12 html
```
Add generated public key (id_rsa.pub) into Github "Deploy keys"

## License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

[MIT](https://choosealicense.com/licenses/mit/)

