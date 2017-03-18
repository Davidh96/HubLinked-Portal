<?php

function changeURL() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
}

function connect_to_database(){
    
    $pg_conn = pg_connect(changeURL());
    
}

function check_table($thing, $table){
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT $thing FROM  $table WHERE $thing = $data");
    
    return $result;
}

function check_for_tables(){
    
    $result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";

if (!pg_num_rows($result)) {
  echo "Your connection is working, but your database is empty\n";
} else {
  echo "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";
}

?>