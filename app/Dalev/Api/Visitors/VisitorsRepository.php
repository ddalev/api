<?php

namespace Dalev\Api\Visitors;

use Dalev\Api\AbstractRepository;

class VisitorsRepository extends AbstractRepository {

  public function getVisitors()
  {
    $sql = "SELECT * from visitors";
    $results = $this->fetchAll($sql);

    return $results;
  }

  public function getVisitorsByPeriod($data)
  {
    $sql = "SELECT SUM(IF(type = 'google', 1, 0)) as `Google Visitors`, ";
    $sql .= " SUM(IF(type = 'other', 1, 0)) as `Positive Guys&quot` ";
    $sql .= " FROM visitors ";
    $sql .= " WHERE 1 = 1 ";
    if (isset($data['DateFrom'])) {
        $sql .= " AND date >= '".date('Y-m-d', strtotime($data['DateFrom']))."' ";
    }
    if (isset($data['DateTo'])) {
        $sql .= " AND date <= '".date('Y-m-d', strtotime($data['DateTo']))."' ";
    }

    $results = $this->fetch($sql);

    return $results;
  }


}
