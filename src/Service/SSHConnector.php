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
use Crypt_RSA;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\InputStream;
use Symfony\Component\Process\Process;

class SSHConnector
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
        $key = new Crypt_RSA();
        $key->loadKey(file_get_contents('C:\Users\UHP Digital\.ssh\id_rsa'));

        if(!$this->ssh2->login($this->username, $key))
        {
            exit('Login Failed');
        }
    }


    public function backupDatabaseOnRemote(BDatabase $database)
    {
        $databasePort = $database->getPort();
        $databaseUsername = $database->getUserName();
        $databasePassword = $database->getPassword();
        $databaseServerName = $database->getServerName();


        $authorisation = '-u '.$databaseUsername.' -p'.$databasePassword.' -P '.$databasePort;
        $exportedFileName = $databaseServerName.'.sql';
        $exportCommand = 'mysqldump '.$authorisation.' '.$databaseServerName.' > '.$exportedFileName;  //TODO: this executes (and creates empty file) even if authorisation to myslq have failed

        $isFoundCommand = 'test -f '.$exportedFileName.' && echo "<br>Your file is in" && pwd  "</br>" || echo "<br>File not created</br>"';

        echo "<br>".$this->ssh2->exec($exportCommand)."</br>";
        echo $this->ssh2->exec($isFoundCommand);

        $remoteFilePath = '/root/'.$exportedFileName;
        $localDirectory = 'C:\Users\UHP Digital\Desktop\tuPosalji';  //TODO: read from ..?

        $scpCommand = 'scp -P '.$this->port.' '.$databaseUsername.'@'.$this->host.':"'.$remoteFilePath.'" "'.$localDirectory.'"';

       //echo $scpCommand;
        if(!exec($scpCommand)){
            echo '<br>file successfully saved to '.$localDirectory.'</br>';
        }

        #provjeriti jel filesize odgovara
    }


    public function copyDatabaseFromRemote()
    {

    }

    public function copyFilesFromRemote()
    {

//        echo $this->ssh2->exec('mysql -v');

    }

}