<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
|--------------------------------------------------------------------------
| Composer Path
|--------------------------------------------------------------------------
|
| The path that Composer's autoload file is expected to live. By default,
| the vendor folder is in the Root directory, but you can customize that here.
*/
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Timing Constants
|--------------------------------------------------------------------------
|
| Provide simple ways to work with the myriad of PHP functions that
| require information to be in seconds.
*/
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// Redis caching expire time 
define('CACHE_EXPIRE_TIME', 86400); 

define('CONFIGURATION', 'configuration'); 
define('CONTACTUS', 'contactus'); 
define('COUNTRY_AC', 'countries_ac');  
define('COUNTRY_ALL', 'countries_all');  
define('STATES_AC', 'states_ac');    
define('STATES_ALL', 'states_all');   
define('DEPARTMENTS_AC', 'departments_ac'); 
define('DEPARTMENTS_ALL', 'departments_all'); 
define('JOBTITLES_AC', 'jobtitles_ac');  
define('JOBTITLES_ALL', 'jobtitles_all');  
define('EMAILTEMPLATES_AC', 'emailtemplates_ac');   
define('EMAILTEMPLATES_ALL', 'emailtemplates_all'); 
define('Q_QUESTIONS_AC', 'q_questions_ac');  
define('Q_QUESTIONS_ALL', 'q_questions_all'); 
define('EVALUATIONTYPES_AC', 'evaluationtypes_ac'); 
define('EVALUATIONTYPES_ALL', 'evaluationtypes_all');  
define('E_QUESTIONS_AC', 'e_questions_ac');  
define('E_QUESTIONS_ALL', 'e_questions_all');

// Cpanel credentails //
define('CPANEL_USER', 'devbyo5');   
define('CPANEL_PASS', 'v_l3VCtkwnhA'); 
define('CPANEL_SKIN', 'paper_lantern');  
define('CPANEL_HOST', 'devbyopeneyes.com'); 
define('CPANEL_DIR', 'public_html/MOE/company'); 
define('DB_USER', 'devbyo5_moe_tool'); 


//define('WEBSITE_URL', 'OpenEyes Technologies Inc.'); 
define('WEBSITE_URL', 'OpenEyes Software Solution'); 
 

//   Local
define('ACTIVE_GROUP', 'default'); // database mode
define('API_BASE_URL', 'http://localhost/CI4/'); // API local Base URL
define('BASE_URL', 'http://localhost:8081/'); // Frontend local Base URL
define('TOOL_URL', 'http://localhost/OESS_MOE_Frontend/login'); // Frontend Tool Base URL
define('FILE_DIR', './assets/');    //File Directory - Server

//   Dev
// define('ACTIVE_GROUP', 'Dev'); // database mode
// define('API_BASE_URL', 'https://api.moe-website.devbyopeneyes.com/'); // API local Base URL
// define('BASE_URL', 'https://moe-website.devbyopeneyes.com/'); // Frontend local Base URL
// define('TOOL_URL', 'https://moe.devbyopeneyes.com/'); // Frontend Tool Base URL
// define('FILE_DIR', './assets/');    //File Directory - Server

//   UAT
// define('ACTIVE_GROUP', 'UAT'); // database mode
// define('API_BASE_URL', 'https://api.moe-website.uatbyopeneyes.com/'); // API local Base URL
// define('BASE_URL', 'https://moe-website.uatbyopeneyes.com/'); // Frontend local Base URL
// define('TOOL_URL', 'https://moe.uatbyopeneyes.com/'); // Frontend Tool Base URL
// define('FILE_DIR', './assets/');    //File Directory - Server

//   PROD
// define('ACTIVE_GROUP', 'PROD'); // database mode
// define('API_BASE_URL', 'https://moewebsiteapi.prodbyopeneyes.com/'); // API local Base URL
// define('BASE_URL', 'https://moewebsite.prodbyopeneyes.com/'); // Frontend local Base URL
// define('TOOL_URL', 'https://moeplatform.prodbyopeneyes.com/'); // Frontend Tool Base URL
// define('FILE_DIR', './assets/');    //File Directory - Server

//   UAT Live
// define('ACTIVE_GROUP', 'UATLIVE'); // database mode
// define('API_BASE_URL', 'http://moe-website-api-prod.uatbyopeneyes.com/'); // API local Base URL
// define('BASE_URL', 'http://moe-website-prod.uatbyopeneyes.com/'); // Frontend local Base URL
// define('TOOL_URL', 'http://moe-prod.uatbyopeneyes.com/'); // Frontend Tool Base URL
// define('FILE_DIR', './assets/');    //File Directory - Server