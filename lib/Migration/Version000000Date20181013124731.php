<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Andrii Rublov <a@rublov.me>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Finances\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

class Version000000Date20181013124731 extends SimpleMigrationStep {

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if (!$schema->hasTable('finances')) {
			$table = $schema->createTable('finances');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);
			$table->addColumn('title', 'string', [
				'notnull' => true,
				'length' => 200
			]);
			$table->addColumn('user_id', 'string', [
				'notnull' => true,
				'length' => 200,
			]);
			$table->addColumn('content', 'text', [
				'notnull' => true,
				'default' => ''
			]);

			$table->setPrimaryKey(['id']);
			$table->addIndex(['user_id'], 'finances_user_id_index');
		}
		return $schema;
	}
}
