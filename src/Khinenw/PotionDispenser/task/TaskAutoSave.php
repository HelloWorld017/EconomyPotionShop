<?php

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