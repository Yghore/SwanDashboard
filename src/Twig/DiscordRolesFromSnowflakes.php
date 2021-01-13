<?php


namespace App\Twig;


use App\Discord\SwanClient;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DiscordRolesFromSnowflakes extends AbstractExtension
{
    private SwanClient $swanClient;

    public function __construct(SwanClient $swanClient)
    {
        $this->swanClient = $swanClient;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('discordRolesFromSnowflakes', [$this, 'discordRolesFromSnowflakes']),
        ];
    }

    public function discordRolesFromSnowflakes(array $snowflakes): array
    {
        return $this->swanClient->getRolesFromSnowflakes($snowflakes);
    }
}