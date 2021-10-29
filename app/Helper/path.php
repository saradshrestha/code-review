<?php

    function loadRoutes($fileName, $moduleName)
    {
        return modulePath($moduleName) . 'routes' . DS() . $fileName;
    }

    function loadMigrations($moduleName)
    {
        return modulePath($moduleName) . 'database' . DS() . 'migrations';
    }

    function loadViews($moduleName)
    {
        return modulePath($moduleName) . 'resources' . DS() . 'views';
    }

    function loadConfig($fileName, $moduleName)
    {
        return modulePath($moduleName) . 'config' . DS() . $fileName;
    }

    function DS()
    {
        return DIRECTORY_SEPARATOR;
    }
    function modulePath($moduleName)
    {
        return app_path() . DS() . 'Modules' . DS() . $moduleName . DS();
    }