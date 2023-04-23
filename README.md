
# Github WebHook Deployer PHP Script

- This is PHP webhook deployer script to auto git pull source code on server.

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

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
