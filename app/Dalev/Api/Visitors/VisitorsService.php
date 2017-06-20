<?php

namespace Dalev\Api\Visitors;

use Dalev\Api\AbstractApiService;
use Dalev\Api\Resources;

class VisitorsService extends AbstractApiService {

  private $resourceType = Resources::VISITORS_RESOURCE;
  private $repository = null;

  const AGGREGATIONS = 'aggegation';

  public function __construct()
  {
    $this->repository = new VisitorsRepository();
    parent::__construct($this->resourceType);
  }

  public function validateData(array $data)
  {
    //Validate or process data keys and values
    return $data;
  }

  public function read(array $data, $inneType = '')
  {
    if ($inneType == self::AGGREGATIONS) {
      $results = $this->repository->getVisitorsByPeriod(
        $this->validateData($data)
      );
    } else {
      $results = $this->repository->getVisitors(
        $this->validateData($data)
      );
    }

    return $results;
  }

  public function create(array $data)
  {
    $response = true;
    return $response;
  }

  public function update(array $data)
  {
    $response = true;
    return $response;
  }

  public function delete(array $data)
  {
    $response = true;
    return $response;
  }
}
