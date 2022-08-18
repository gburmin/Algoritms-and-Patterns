<?php

/**
 * ORMFactory classes
 */
interface ORMFactoryInterface
{
    function DBConnection(): DBConnectionInterface;
    function DBRecord(): DBRecordInterface;
    function DBQueryBuilder(): DBQueryBuilderInterface;
}

class MySQLFactory implements ORMFactoryInterface
{
    function DBConnection(): DBConnectionInterface
    {
        return new MySQLDBConnection;
    }
    function DBRecord(): DBRecordInterface
    {
        return new MySQLDBRecord;
    }
    function DBQueryBuilder(): DBQueryBuilderInterface
    {
        return new MySQLDBQueryBuilder;
    }
}

class PostgreSQLFactory implements ORMFactoryInterface
{
    function DBConnection(): DBConnectionInterface
    {
        return new PostgreSQLDBConnection;
    }
    function DBRecord(): DBRecordInterface
    {
        return new PostgreSQLDBRecord;
    }
    function DBQueryBuilder(): DBQueryBuilderInterface
    {
        return new PostgreSQLDBQueryBuilder;
    }
}

class OracleFactory implements ORMFactoryInterface
{
    function DBConnection(): DBConnectionInterface
    {
        return new OracleDBConnection;
    }
    function DBRecord(): DBRecordInterface
    {
        return new OracleDBRecord;
    }
    function DBQueryBuilder(): DBQueryBuilderInterface
    {
        return new OracleDBQueryBuilder;
    }
}



/**
 * Components classes
 */
interface DBConnectionInterface
{
    function getDBType();
}

class MySQLDBConnection implements DBConnectionInterface
{
    private $DBType;

    function __construct()
    {
        $this->DBType = 'MySQL';
    }
    function getDBType()
    {
        return $this->DBType;
    }
}

class PostgreSQLDBConnection implements DBConnectionInterface
{
    private $DBType;

    function __construct()
    {
        $this->DBType = 'PostgreSQL';
    }
    function getDBType()
    {
        return $this->DBType;
    }
}

class OracleDBConnection implements DBConnectionInterface
{
    private $DBType;

    function __construct()
    {
        $this->DBType = 'Oracle';
    }
    function getDBType()
    {
        return $this->DBType;
    }
}

interface DBRecordInterface
{
    function record();
}

class MySQLDBRecord implements DBRecordInterface
{
    function record()
    {
        echo 'Record for MySQL finished';
    }
}

class PostgreSQLDBRecord implements DBRecordInterface
{
    function record()
    {
        echo 'Record for Postgre finished';
    }
}

class OracleDBRecord implements DBRecordInterface
{
    function record()
    {
        echo 'Record for Oracle finished';
    }
}

interface DBQueryBuilderInterface
{
}

class MySQLDBQueryBuilder implements DBQueryBuilderInterface
{
}

class PostgreSQLDBQueryBuilder implements DBQueryBuilderInterface
{
}

class OracleDBQueryBuilder implements DBQueryBuilderInterface
{
}

$concreteFactoryInstance = new MySQLFactory;
$connection = $concreteFactoryInstance->DBConnection();
$connection->getDBType();
$record = $concreteFactoryInstance->DBRecord();
$sqlResult = $concreteFactoryInstance->DBQueryBuilder();
