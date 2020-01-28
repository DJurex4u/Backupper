<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/28/2020
 * Time: 11:43 AM
 */

namespace App\Service;


use App\Entity\Connection;
use mysql_xdevapi\Exception;

class SSHConector
{
    private $username;
    private $host;
    private $password;
    private $port;
    private $outputMessage;

    public function __construct(Connection $connection)
    {
        $this->username = $connection->getUsername();
        $this->host = $connection->getDbHostName();
        $this->password = $connection->getPassword();
        $this->port = $connection->getPort();
        $this->outputMessage = 'no executed commands yet';
    }

    public function connectSSH()
    {

        $shellCommand = 'sshpass -p buda123 ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null '.$this->username.'@'.$this->host.' -p '.$this->port;
         die($shellCommand);
        //shell_exec($shellCommand);
//        $kita = [];
        try {

            $conn = ssh2_connect('root@127.0.0.1', '32769');
//            ssh2_auth_password($conn, 'root', 'buda123');
//
//            dump(ssh2_exec($conn, 'ls -la'));
        phpinfo();

//            dump(exec('whoami'));
//            dump(shell_exec($shellCommand . ''));
//            $result = null;
//            dump(exec('pwd'));
//            dump(shell_exec('sshpass -p buda123 ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@127.0.0.1 -p 32769 "ls -la"'));
//            dump(exec('sshpass -p buda123 ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@127.0.0.1 -p 32769 "ls -la"', $result));
//            dump($result);
//            dump(exec($shellCommand . ' && pwd',$kita));
//            dump($kita);
        } catch (Exception $e){
            die($e->getMessage());
        }

        die('kraj');
    }
}