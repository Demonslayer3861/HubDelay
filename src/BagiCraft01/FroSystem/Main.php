<?php

declare(strict_types=1);

namespace BagiCraft01\HubDelay;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\scheduler\Task;

class Main extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getLogger()->info("[FroSystem] Plugin enabled by BagiCraft01");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onDisable() {
		$this->getServer()->getLogger()->info("[FroSystem] Plugin disabled by BagiCraft01");
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		switch ($cmd->getName()) {
			case 'hub':
				if ($sender instanceof Player) {
					$this->getScheduler()->scheduleDelayedTask(new HubTask($this, $sender->getName()), 20*5);
					$sender->sendMessage("§aKamu akan diteleportkan dalam 5 detik!");
					return true;
				} else {
					$sender->sendMessage("§cRun this command in-game!");
					return true;
				}
			break;
		}
	}

}
