<?php

namespace Dalev\Api;

interface ApiServiceInterface {

  public function getType();

  public function validateData(array $data);

  public function create(array $data);

  public function read(array $data, $inneType = '');

  public function update(array $data);

  public function delete(array $data);

}
