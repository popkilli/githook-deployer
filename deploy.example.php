<?php
define("TOKEN", ""); // generate by "openssl rand -base64 32"
define("REMOTE_REPOSITORY", "git@github.com:username/reponame.git"); // edit repo remote address
define("DIR", "/var/www/html/reponame"); // repo path
define("BRANCH", "main"); // branch name
define("LOGFILE", "/var/www/html/githook/logs/".date('YmdHis')."_reponame_deploy.log"); // log path
define("GIT", "/usr/bin/git");
define("MAX_EXECUTION_TIME", 180);
define("BEFORE_PULL", "");
define("AFTER_PULL", "");

require_once("deployer.php");
