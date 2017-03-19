<?php
<<<<<<< HEAD
<<<<<<< HEAD
echo "Hello World";
=======
echo "hello";
>>>>>>> a97cf4f9fae14e8b0cd99a7ab69a89d6849f5288

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "user=$user password=$pass host=$host sslmode=require dbname=" . substr($path, 1); 
}


$pg_conn = pg_connect(pg_connection_string_from_database_url());


$result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables");
print "<pre>\n";

=======
echo "hello";

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "user=$user password=$pass host=$host sslmode=require dbname=" . substr($path, 1); 
}


$pg_conn = pg_connect(pg_connection_string_from_database_url());


$result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables");
print "<pre>\n";

>>>>>>> a97cf4f9fae14e8b0cd99a7ab69a89d6849f5288
if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";

/*
include('/vendor/autoload.php');
echo "after require";
$app = new Silex\Application();
$app['debug'] = true;
<<<<<<< HEAD
<<<<<<< HEAD
/*
$dbopts = parse_url(getenv('DATABASE_URL'));
=======
$DATABASE_URL = "postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj";
$dbopts = parse_url(getenv($DATABASE_URL));
>>>>>>> a97cf4f9fae14e8b0cd99a7ab69a89d6849f5288
=======
$DATABASE_URL = "postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj";
$dbopts = parse_url(getenv($DATABASE_URL));
>>>>>>> a97cf4f9fae14e8b0cd99a7ab69a89d6849f5288
$app->register(new Herrera\Pdo\PdoServiceProvider(),
               array(
                   'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
                   'pdo.username' => $dbopts["user"],
                   'pdo.password' => $dbopts["pass"]
               )
);

$app->get('/db/', function() use($app) {
  $st = $app['pdo']->prepare('SELECT name FROM test_table');
  $st->execute();

  $names = array();
  while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
    $app['monolog']->addDebug('Row ' . $row['name']);
    $names[] = $row;
  }

  return $app['twig']->render('database.twig', array(
    'names' => $names
  ));
});
*/

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('cowsay');
  return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
});



echo "Hello World";

$app->run();
*/
?>

