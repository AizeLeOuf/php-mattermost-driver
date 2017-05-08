<?php
/**
 * This Driver is based entirely on official documentation of the Mattermost Web
 * Services API and you can extend it by following the directives of the documentation.
 *
 * God bless this mess.
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://api.mattermost.com/
 */

namespace Gnello\Mattermost\Models;

/**
 * Class CommandsModel
 *
 * @package Gnello\MattermostRestApi\Models
 */
class CommandsModel extends AbstractModel
{
    /**
     * @var string
     */
    private static $endpoint = '/commands';

    /**
     * @param array $requestOptions
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createCommand($requestOptions)
    {
        return $this->client->post(self::$endpoint, $requestOptions);
    }

    /**
     * @param array $requestOptions
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listCommandsForTeam($requestOptions)
    {
        return $this->client->get(self::$endpoint, $requestOptions);
    }

    /**
     * @param $teamId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAutocompleteCommands($teamId)
    {
        return $this->client->get(TeamModel::$endpoint . '/' . $teamId . '/commands/autocomplete');
    }

    /**
     * @param       $commandId
     * @param array $requestOptions
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function updateCommand($commandId, $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/' . $commandId, $requestOptions);
    }

    /**
     * @param $commandId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteCommand($commandId)
    {
        return $this->client->delete(self::$endpoint . '/' . $commandId);
    }

    /**
     * @param $commandId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function generateNewToken($commandId)
    {
        return $this->client->put(self::$endpoint . '/' . $commandId . '/regen_token');
    }
}
