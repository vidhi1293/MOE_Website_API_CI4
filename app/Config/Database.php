<?php namespace Config;

/**
 * Database Configuration
 *
 * @package Config
 */

class Database extends \CodeIgniter\Database\Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database/';

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = ACTIVE_GROUP;
	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default = [
		'DSN'      => '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'moe_website',
		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'cacheOn'  => false,
		'cacheDir' => '',
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];
	public $ToolDB = array(
		'dsn'	=> '',
	
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'moe_tool',
	
		// 'hostname' => '199.250.200.224',
		// 'username' => 'devbyo5_local_moe_tool',
		// 'password' => 'aCD6D]dFQYQ*',
		// 'database' => 'devbyo5_local_moe_tool',
		
		// 'hostname' => 'localhost',
		// 'username' => 'devbyo5_moe_tool',
		// 'password' => 'XxNQ?W2~z86n',
		// 'database' => 'devbyo5_moe_tool',
	
		// 'hostname' => 'localhost',
		// 'username' => 'uatbyo5_moe_tool',
		// 'password' => 'O{fzjVmfngCJ',
		// 'database' => 'uatbyo5_moe_tool',
	
		// 'hostname' => 'localhost',
		// 'username' => 'prodbyopeneyes_moe_tool',
		// 'password' => '.3$t7hG)?Y@V',
		// 'database' => 'prodbyopeneyes_moe_tool',
	
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE,
		'port'     => 3306,
	);
	public $Dev = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'devbyo5_moe_website',
		'password' => 'kcAYllyOZ82-',
		'database' => 'devbyo5_moe_website',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE,
		'port'     => 3306,
	);
	public $UAT = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'uatbyo5_moe_website',
		'password' => 'GkEM-[{bv[+?',
		'database' => 'uatbyo5_moe_website',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE,
		'port'     => 3306,
	);
	public $PROD = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'prodbyopeneyes_moe_website',
		'password' => '!)m%6dCZDum*',
		'database' => 'prodbyopeneyes_moe_website',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE,
		'port'     => 3306,
	);


	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $tests = [
		'DSN'      => '',
		'hostname' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => ':memory:',
		'DBDriver' => 'SQLite3',
		'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'cacheOn'  => false,
		'cacheDir' => '',
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		if (ENVIRONMENT === 'testing')
		{
			$this->defaultGroup = 'tests';

			// Under Travis-CI, we can set an ENV var named 'DB_GROUP'
			// so that we can test against multiple databases.
			if ($group = getenv('DB'))
			{
				if (is_file(TESTPATH . 'travis/Database.php'))
				{
					require TESTPATH . 'travis/Database.php';

					if (! empty($dbconfig) && array_key_exists($group, $dbconfig))
					{
						$this->tests = $dbconfig[$group];
					}
				}
			}
		}
	}

	//--------------------------------------------------------------------

}
