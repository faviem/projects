<?php
   $db = parse_url(getenv('CLEARDB_DATABASE_URL'));#mysql://bc3999c27aceb4:17048de2@us-cdbr-iron-east-03.cleardb.net/heroku_6e4cd93bb1c44e7?reconnect=true
   $container->setParameter('database_driver', 'pdo_mysql');
   $container->setParameter('database_host', $db['host']);
   $container->setParameter('database_port', $db['port']);
   $container->setParameter('database_name', substr($db["path"], 1));
   $container->setParameter('database_user', $db['user']);
   $container->setParameter('database_password', $db['pass']);
   $container->setParameter('secret', getenv('SECRET'));
   $container->setParameter('locale', 'en');
   $container->setParameter('mailer_transport', null);
   $container->setParameter('mailer_host', null);
   $container->setParameter('mailer_user', null);
   $container->setParameter('mailer_password', null);