<?php

namespace AbbeySoftwareDevelopment\Stylist\Console;

use AbbeySoftwareDevelopment\Stylist\Theme\Theme;
use Illuminate\Console\Command;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stylist;
use Symfony\Component\Console\Input\InputArgument;

class PublishAssetsCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'stylist:publish';

    /**
     * @var string
     */
    protected $description = 'Publish assets associated with Stylist themes.';

    /**
     *  Fire the command, running through the following steps:
     *
     *    1. Install the migrations table
     *    3. Migrate the shift package
     *    4. Publish any and all assets
     *    5. Rebuild the services.json file
     *
     * @return void
     */
    public function handle(): void
    {
        $this->setupThemes();
        $this->publishAssets();

        $this->info('Assets published.');
    }

    /**
     * Fires the publishing event, then works through the array of returned paths and registers
     *  themes for those which are valid (aka, contain a theme.json file).
     * @return void
     */
    protected function setupThemes(): void
    {
        $this->laravel['events']->dispatch('stylist.publishing');

        $themes = Stylist::themes();

        foreach ($themes as $theme) {
            $path = $theme->getPath();

            if ($this->laravel['files']->exists($path . 'assets/')) {
                $this->laravel['stylist']->registerPath($path);
            }
        }
    }

    /**
     * Copies the assets for those themes which were successfully registered with stylist.
     * @return void|null
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function publishAssets()
    {
        $themes = $this->laravel['stylist']->themes();
        $requestedTheme = $this->argument('theme');

        if ($requestedTheme) {
            $theme = $this->laravel['stylist']->get($requestedTheme);

            return $this->publishSingle($theme);
        }

        foreach ($themes as $theme) {
            $this->publishSingle($theme);
        }
    }

    /**
     * Publish a single theme's assets.
     * @param Theme $theme
     * @return void
     */
    protected function publishSingle(Theme $theme): void
    {
        $themePath = public_path('themes/' . $theme->getAssetPath());

        $this->laravel['files']->copyDirectory($theme->getPath() . '/assets/', $themePath);

        $this->info($theme->getName() . ' assets published.');
    }

    /**
     * Developers can publish a specific theme should they wish.
     *
     * @return array
     */
    public function getArguments(): array
    {
        return [
            ['theme', InputArgument::OPTIONAL, 'Name of the theme you wish to publish']
        ];
    }
}
