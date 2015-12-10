<?php
/**
 * Tests bootstrap.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
require implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "..", "vendor", "autoload.php"
));

require implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "helper", "CustomClient.php"
));

require implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "helper", "CustomCommand.php"
));

require implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "helper", "BaseCommandTest.php"
));