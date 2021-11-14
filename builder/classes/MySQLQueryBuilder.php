<?php

namespace app\builder\classes;


/**
 * Each Concrete Builder corresponds to a specific SQL dialect and may implement
 * the builder steps a little bit differently from the others.
 *
 * This Concrete Builder can build SQL queries compatible with MySQL.
 */
class MySQLQueryBuilder implements SQLQueryBuilder
{
	protected $query;

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
