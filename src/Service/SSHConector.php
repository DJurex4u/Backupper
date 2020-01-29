<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/28/2020
 * Time: 11:43 AM
 */

namespace App\Service;
set_include_path(get_include_path() . PATH_SEPARATOR . get_include_path().DIRECTORY_SEPARATOR .'phpseclib1.0.18');

require ('Net\SSH2.php');


use App\Entity\BDatabase;
use App\Entity\Connection;
use mysql_xdevapi\Exception;
use Net_SSH2;

class SSHConector
{
    private $username;
    private $host;
    private $password;
    private $port;
    private $databasePort;
    private $databaseUsername;
    private $databasePassword;
    private $databaseServerName;

    private $ssh2;

    public function __construct(Connection $connection)
    {
        $this->username = $connection->getUsername();
        $this->host = $connection->getDbHostName();
        $this->password = $connection->getPassword();
        $this->port = $connection->getPort();
    }

    public function connectSSH()
    {
        $this->ssh2 = new Net_SSH2($this->host, $this->port);
        if(!$this->ssh2->login($this->username, $this->password))
        {
            exit('Login Failed');
        }
    }


    public function backupDatabaseOnRemote(BDatabase $database)
    {
        $databasePort = $database->getPort();   //TODO: implement port into command
        $databaseUsername = $database->getUserName();
        $databasePassword = $database->getPassword();
        $databaseServerName = $database->getServerName();


        # korak 1 spojiti se na mysql podatci + ime baze
        echo $this->ssh2->exec('mysql -u '.$databaseUsername.' -p'.$databasePassword.' '.$databaseServerName.' -e "SELECT * FROM user;"');

        # KORAK 2 napraviti query koji backupa bazu
        # korak 3 provjeriti file (dali postoji)
        # korak 4 kopirati to na tvoj pc
//        echo $this->ssh2->exec('mysql -u root -proot mysql -e "SELECT * FROM user;"');
    }

    public function copyDatabaseFromRemote()
    {

    }

    public function copyFilesFromRemote()
    {


//        echo $this->ssh2->exec('mysql -v');

    }

}