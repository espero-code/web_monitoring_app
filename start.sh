#!/bin/bash

# Démarrer le script cron.js avec PM2
pm2 start cron.js

# Démarrer Apache en premier plan
apache2-foreground
