<?php
/**
 * The Sounds endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_sounds Sounds endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Sounds endpoint.
 */
class Sounds extends Base
{
    /**
     * Sets the sound id.
     *
     * @param integer $soundId Sound id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($soundId)
    {
        return $this->setArgument("id", $soundId);
    }

    /**
     * Sets the sound name.
     *
     * @param string $name Sound name.
     *
     * @return PortaText\Command\ICommand
     */
    public function name($name)
    {
        return $this->setArgument("name", $name);
    }

    /**
     * Sets the sound description.
     *
     * @param string $description Sound description.
     *
     * @return PortaText\Command\ICommand
     */
    public function description($description)
    {
        return $this->setArgument("description", $description);
    }

    /**
     * Used to export the sound file on a GET.
     *
     * @param string $filename The filename.
     *
     * @return PortaText\Command\ICommand
     */
    public function saveTo($filename)
    {
        return $this->setArgument("accept_sound_file", $filename);
    }

    /**
     * Uploads the given sound file (mp3).
     *
     * @param string $filename The mp3 file.
     *
     * @return PortaText\Command\ICommand
     */
    public function sound($filename)
    {
        return $this->setArgument("sound_file", $filename);
    }

    protected function getBody($method)
    {
        $file = $this->getArgument("sound_file");
        if (!is_null($file)) {
            return "file:$file";
        }
        return parent::getBody($method);
    }

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $endpoint = "sounds";
        $soundId = $this->getArgument("id");
        if (!is_null($soundId)) {
            $endpoint .= "/$soundId";
            $this->delArgument("id");
        }
        $queryString = array();
        $name = $this->getArgument("name");
        if (!is_null($name)) {
            $queryString['name'] = $name;
            $this->delArgument("name");
        }
        $description = $this->getArgument("description");
        if (!is_null($description)) {
            $queryString['description'] = $description;
            $this->delArgument("description");
        }
        if (!empty($queryString)) {
            $queryString = http_build_query($queryString);
            return "$endpoint?$queryString";
        }
        return $endpoint;
    }
}
