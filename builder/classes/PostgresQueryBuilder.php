<?php

namespace app\builder\classes;
/**
 * This Concrete Builder is compatible with PostgreSQL. While Postgres is very
 * similar to Mysql, it still has several differences. To reuse the common code,
 * we extend it from the MySQL builder, while overriding some of the building
 * steps.
 */
class PostgresQueryBuilder implements SqlQueryBuilder
{

	protected function reset(): void
	{
		$this->query = new \stdClass();
	}

	/**
	 * Build a base SELECT query.
	 */
	public function select(string $table, array $fields): SQLQueryBuilder
	{
		$this->reset();
		$this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
		$this->query->type = 'select';

		return $this;
	}

	/**
	 * Add a WHERE condition.
	 */
	public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
	{
		if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
			throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
		}
		$this->query->where[] = "$field $operator '$value'";

		return $this;
	}

	/**
	 * Add a LIMIT constraint.
	 */
	public function limit(int $start, int $offset): SQLQueryBuilder
	{
		if (!in_array($this->query->type, ['select'])) {
			throw new \Exception("LIMIT can only be added to SELECT");
		}
		$this->query->limit = " LIMIT " . $start . ", " . $offset;

		return $this;
	}

	/**
	 * Get the final query string.
	 */
	public function getSQL(): string
	{
		$query = $this->query;
		$sql = $query->base;
		if (!empty($query->where)) {
			$sql .= " WHERE " . implode(' AND ', $query->where);
		}
		if (isset($query->limit)) {
			$sql .= $query->limit;
		}
		$sql .= ";";
		return $sql;
	}
}