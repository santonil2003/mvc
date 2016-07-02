<?php

use Core\Helper\Debug;
use Core\Web\Request;

Debug::r($this->data);

echo Request::getBaseUrl();
