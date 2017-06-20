<?php

namespace Dalev\Api;

use Dalev\Api\Visitors\VisitorsService as VisitorsService;

class Resources {

//Define all existing Resources
  const VISITORS_RESOURCE = 'visitors';

  public function __construct()
  {
  }

  public function getAllResources()
  {
    return array(
      self::VISITORS_RESOURCE,
    );
  }

  public function getResourceService($sResource)
  {
    $oResourceSertice = null;

    switch ($sResource) {
      case self::VISITORS_RESOURCE:
        $oResourceSertice = new VisitorsService();
        break;

      default:
        $oResourceSertice = null;
        break;
    }

    return $oResourceSertice;
  }
}
