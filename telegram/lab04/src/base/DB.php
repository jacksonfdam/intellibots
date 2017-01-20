<?php
namespace Base;
use Aura\Sql\ExtendedPdo;
class DB
{
    /**
     * @return ExtendedPdo
     */
    public static function getInstance()
    {
        $dbopts = parse_url(getenv('DATABASE_URL'));
        $db = new ExtendedPdo(
            "pgsql:host={$dbopts["host"]};port={$dbopts["port"]};dbname=".ltrim($dbopts["path"],'/'),
            $dbopts['user'],
            $dbopts['pass']
        );
        $db->exec(
            "CREATE TABLE IF NOT EXISTS users
(
  id serial NOT NULL,
  token character varying(150) NOT NULL,
  md5token character varying(32) NOT NULL,
  telegram_id integer NULL,
  email varchar(150) NULL,
  created timestamp with time zone NOT NULL DEFAULT now(),
  CONSTRAINT user_pk PRIMARY KEY (id),
  CONSTRAINT users_telegram_id_uk UNIQUE (telegram_id)
);"
        );
        return $db;
    }
}
