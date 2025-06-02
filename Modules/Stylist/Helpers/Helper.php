<?php
use Modules\Stylist\Support\ModuleInfo;

if (! function_exists('stylist_feature_enabled')) {
    /**
     * Check if a feature is enabled in the config.
     */
    function stylist_feature_enabled(string $key): bool
    {
        return (bool) config(ModuleInfo::nameLower().".features.{$key}", false);
    }
}
