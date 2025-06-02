<?php
use Modules\Pages\Support\ModuleInfo;

if (! function_exists('pages_feature_enabled')) {
    /**
     * Check if a feature is enabled in the config.
     */
    function pages_feature_enabled(string $key): bool
    {
        return (bool) config(ModuleInfo::nameLower().".features.{$key}", false);
    }
}
