<!DOCTYPE html>

<html>

<body>

<?php

$db_conn = pg_connect(
    "host=".getenv("DB_HOST")
    ." dbname=".getenv("DB_NAME")
    ." user=".getenv("USER")
    ." password=".getenv("DB_PWD")
);
if (!$db_conn) {
    echo "An error occurred.\n";
    exit;
  }
else{
    echo "<h1>To Do List:</h1> \n";
}

$query = "drop table if exists todo;";
$query .= "create table if not exists todo(id INT GENERATED ALWAYS AS IDENTITY, item VARCHAR NOT NULL);";
$query .= "insert into todo(item) values('Pick-up Laundry');";
$query .= "insert into todo(item) values('Post Letter');";

pg_query($db_conn, $query);

$result = pg_query($db_conn, "select * from todo;");

echo "<ul>\n";
while ($row = pg_fetch_row($result)) {
    echo "\t<li id=$row[0]>$row[1]</li>\n";
  }
echo "</ul>\n";
echo " script! Executed";

?>

</body>

</html>