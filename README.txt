git clone job.git

config database with:
	'port' => 8889,
	'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',

run ./app/Console/cake schema create

/users/create

./app/Console/cake Migrations.Migration generate -f

cd app/webroot | sass --watch --compass sass:css