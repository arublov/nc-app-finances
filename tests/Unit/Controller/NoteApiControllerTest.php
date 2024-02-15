<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Andrii Rublov <a@rublov.me>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Finances\Tests\Unit\Controller;

use OCA\Finances\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new NoteApiController($this->request, $this->service, $this->userId);
	}
}
