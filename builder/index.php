<?php


use app\builder\classes\MySQLQueryBuilder;
use app\builder\classes\PostgresQueryBuilder;
use app\builder\classes\SqlQueryBuilder;
require_once "../common/autoloader.php";

/**
 * Note that the client code uses the builder object directly. A designated
 * Director class is not necessary in this case, because the client code needs
 * different queries almost every time, so the sequence of the construction
 * steps cannot be easily reused.
 *
 * Since all our query builders create products of the same type (which is a
 * string), we can interact with all builders using their common interface.
 * Later, if we implement a new Builder class, we will be able to pass its
 * instance to the existing client code without breaking it thanks to the
 * SQLQueryBuilder interface.
 */
function clientCode(SqlQueryBuilder $queryBuilder)
{
	// ...

	$query = $queryBuilder
		->select("users", ["name", "email", "password"])
		->where("age", 18, ">")
		->where("age", 30, "<")
		->limit(10, 20)
		->getSQL();

	echo $query;

	// ...
}


/**
 * The application selects the proper query builder type depending on a current
 * configuration or the environment settings.
 */
// if ($_ENV['database_type'] == 'postgres') {
//     $builder = new PostgresQueryBuilder(); } else {
//     $builder = new MysqlQueryBuilder(); }
//
// clientCode($builder);


echo "Testing MySQL query builder:\n <br/>";
clientCode(new MySQLQueryBuilder());

echo "\n\n";

echo "<br/>Testing PostgresSQL query builder:\n <br/>";
clientCode(new PostgresQueryBuilder());
?>

