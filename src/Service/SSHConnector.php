<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/28/2020
 * Time: 11:43 AM
 */

namespace App\Service;


use App\Entity\BData;
use App\Entity\BDatabase;
use App\Entity\Connection;
use Net_SSH2;
use Crypt_RSA;


class SSHConnector
{
    private $username;
    private $host;
    private $password;
    private $sshPrivateKey;
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
        $this->sshPrivateKey = $connection->getSshPrivateKey();
    }

    public function connectSSH()
    {
        $this->ssh2 = new Net_SSH2($this->host, $this->port);
        $key = new Crypt_RSA();
//        $key->loadKey(file_get_contents('C:\Users\UHP Digital\.ssh\id_rsa'));
        $key->loadKey($this->sshPrivateKey);

        if(!$this->ssh2->isConnected()){
            echo ("Connecting to: ".$this->host.":".$this->port);
            dump($key);
            if(!$this->ssh2->login($this->username, $key))
            {
                exit('<br>Login Failed');
            }
        }

    }


    public function backupDatabaseOnRemote(BDatabase $database)
    {
        $databaseUsername = $database->getUserName();
        $databasePassword = $database->getPassword();
        $databaseServerName = $database->getServerName();
        $databasePort = $database->getPort();
        $databaseName = $database->getDbName();
        $localDirectory = $database->getDestinationPath();


        $authorisation = '-u '.$databaseUsername.' -p'.$databasePassword.' -P '.$databasePort;
        $exportedFileName = $databaseName.'.sql';
        $exportCommand = 'mysqldump '.$authorisation.' '.$databaseServerName.' > '.$exportedFileName;  //TODO: this executes (and creates empty file) even if authorisation to myslq have failed

        $isFoundCommand = 'test -f '.$exportedFileName.' && echo "<br>Your file is in" && pwd  || echo "<br>File not created"';

        echo "<br>".$this->ssh2->exec($exportCommand);
        echo $this->ssh2->exec($isFoundCommand);

        $remoteFilePath = '/root/'.$exportedFileName;
        //$localDirectory = 'C:\Users\UHP Digital\Desktop\tuPosalji';  //TODO: read from ..?

        $scpCommand = 'scp -P '.$this->port.' '.$databaseUsername.'@'.$databaseServerName.':"'.$remoteFilePath.'" "'.$localDirectory.'"';

       //echo $scpCommand;
        if(!exec($scpCommand)){
            echo '<br>file successfully saved to '.$localDirectory;
        }

        #provjeriti jel filesize odgovara
    }


    public function copyDatabaseFromRemote()
    {

    }

    public function copyFilesFromRemote(BData $bData)
    {
        $scpCommand = 'scp -r -P '.$this->port.' '.$this->username.'@'.$this->host.':"'.$bData->getSourceDirectory().'" "'.$bData->getDestinationDirectory().'"';
//        echo '<br>'.$scpCommand;
        if(!exec($scpCommand)){
            echo '<br>file successfully saved to '.$bData->getDestinationDirectory();
        }


//        echo $this->ssh2->exec('mysql -v');

    }

}