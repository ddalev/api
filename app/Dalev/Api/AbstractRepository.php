<?php

namespace Dalev\Api;

abstract class AbstractRepository {

  public $PDO;

  public function __construct()
  {
      $this->PDO = new \PDO('mysql:host=localhost;dbname=test', 'root', 'root');
  }

  public function fetchAll($sql)
  {
      $sth = $this->PDO->prepare($sql);
      $sth->execute();
      return $sth->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function fetch($sql)
  {
      $sth = $this->PDO->prepare($sql);
      $sth->execute();
      return $sth->fetch(\PDO::FETCH_ASSOC);
  }
}
