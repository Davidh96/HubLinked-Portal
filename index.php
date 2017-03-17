<?php
echo "hello";
/*
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "user=$user password=$pass host=$host sslmode=require dbname=" . substr($path, 1); 
}


$pg_conn = pg_connect(pg_connection_string_from_database_url());


$result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";

if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";
*/
?>