<?php
$container->setParameter('database_host', getEnv("OPENSHIFT_MYSQL_DB_HOST"));
$container->setParameter('database_port', getEnv("OPENSHIFT_MYSQL_DB_PORT"));
$container->setParameter('database_driver', "pdo_mysql");
$container->setParameter('database_name', "guestbook");
$container->setParameter('database_user', "<your db user>");
$container->setParameter('database_password', "<your db passwd>");
$container->setParameter('mailer_transport', "smtp");
$container->setParameter('mailer_host', "localhost");
$container->setParameter('mailer_user', null);
$container->setParameter('mailer_password', null);
$container->setParameter('locale', "en");
$container->setParameter('secret', "88d6a4a7436d7845d4693543ada88e6256d01f07");
$container->setParameter('database_path', null);
