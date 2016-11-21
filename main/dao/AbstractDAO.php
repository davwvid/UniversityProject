<?php

abstract class AbstractDAO
{
    protected $pdoInstance;

    public function __construct(PDO $pdoInstance)
    {
        $this->pdoInstance = $pdoInstance;
        if ($this->pdoInstance === null) {
            throw new Exception("No DB connection!");
        }
    }
}