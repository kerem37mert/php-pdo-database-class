<?php

namespace site;

class database
{
    private string $dbname = "site.db";
    public $pdo = null;
    public $stmt = null;

    public function __construct()
    {
        try {

            $this->pdo = new \PDO("sqlite:$this->dbname");
            echo "true";

        }catch (\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getRows($query, $params=null)
    {
        try
        {
            if(is_null($params)):
                $this->stmt = $this->pdo->query($query);
            else:
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            endif;

            return $this->stmt->fetchALl();
        }
        catch(\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getRow($query, $params=null)
    {
        try
        {
            if(is_null($params)):
                $this->stmt = $this->pdo->query($query);
            else:
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            endif;

            return $this->stmt->fetch();
        }
        catch(\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function insert($query, $params=null)
    {
        try
        {
            if(is_null($params)):
                $this->stmt = $this->pdo->query($query);
            else:
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            endif;

            return $this->pdo->lastInsertId();
        }
        catch(\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function update($query, $params=null)
    {
        try
        {
            if(is_null($params)):
                $this->stmt = $this->pdo->query($query);
            else:
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);

                return $this->stmt->rowCount();
            endif;
        }
        catch(\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function delete($query, $params=null)
    {
        try
        {
            if(is_null($params)):
                $this->stmt = $this->pdo->query($query);
            else:
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            endif;
        }
        catch(\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}