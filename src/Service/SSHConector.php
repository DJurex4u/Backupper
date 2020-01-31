<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/28/2020
 * Time: 11:43 AM
 */

namespace App\Service;


use App\Entity\BDatabase;
use App\Entity\Connection;
use Net_SSH2;

class SSHConector
{
    private $username;
    private $host;
    private $password;
    private $port;

    /**
     * @var Net_SSH2
     */
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

        $authorisation = '-u '.$databaseUsername.' -p'.$databasePassword;
//        $sqlQuery1 = $databaseServerName.' -e "SELECT * FROM user;"';
//        $fullHardcodedCommand = 'mysql -u '.$databaseUsername.' -p'.$databasePassword.' '.$databaseServerName.' -e "SELECT * FROM user;"'; //VALJA
        $exportedFile = $databaseServerName.'.sql';
        $exportCommand = 'mysqldump '.$authorisation.' '.$databaseServerName.' > '.$exportedFile;
        $isFoundCommand = 'test -f '.$exportedFile.' && echo "Your file is in" && pwd || echo "File not found"';


        # KORAK 2 napraviti query koji backupa bazu
        //TODO: Check if it is connected to remote?
        // what if file already exists?
        echo $this->ssh2->exec($exportCommand);
        echo $this->ssh2->exec($isFoundCommand);
        die("tusam");

        if ($isFoundCommand){
            $rsyncCommand = '';
        }



//        echo $this->ssh2->exec('mysqldump -u '.$databaseUsername.' -p'.$databasePassword.' '.$databaseServerName.' > ');
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