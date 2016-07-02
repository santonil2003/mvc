<?php
use Core\MVC\Request;
use Core\MVC\Debug;
?>
<a href="<?php echo Request::createUrl('index','getBook',array('id'=>$this->bookId))?>">View Book </a>
<?php

Debug::r($this->bookId);