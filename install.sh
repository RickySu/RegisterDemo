#!/bin/bash
mkdir cache
mkdir log
mkdir web/uploads
mkdir plugins
./symfony plugin:install sfDoctrineGuardPlugin --stability=beta
./symfony plugin:install sfAdminDashPlugin --stability=beta --install_deps
./symfony project:permissions
./symfony plugin:publish-assets
