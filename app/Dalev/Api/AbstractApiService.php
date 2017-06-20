<?php

namespace Dalev\Api;

abstract class AbstractApiService implements ApiServiceInterface {

  private $resourceType;

  public function __construct($resourceType)
  {
      $this->resourceType = $resourceType;
  }

  public function getType()
  {
    return $this->resourceType;
  }

  abstract public function validateData(array $data);

  abstract public function create(array $data);

  abstract public function read(array $data, $inneType = '');

  abstract public function update(array $data);

  abstract public function delete(array $data);

}
