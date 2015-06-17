<?php

/*
 * Potion Dispenser, An potion dispenser for EconomyS.
 * Copyright (C) 2015  Khinenw <deu07115@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
namespace Khinenw\PotionDispenser\task;


use Khinenw\PotionDispenser\Dispenser;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class TaskAutoSave extends PluginTask{

	public function __construct(Dispenser $plugin){
		parent::__construct($plugin);
	}

	public function onRun($currentTick){
		$config = new Config($this->getOwner()->getDataFolder()."dispensers.yml", Config::YAML);
		$config->setAll($this->getOwner()->getDispenserList());
		$config->save();
		$this->getOwner()->getLogger()->info(TextFormat::AQUA."Auto-saved!");
	}
}