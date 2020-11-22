<?php

declare(strict_types=1);

namespace Ghezin\cp\Commands;

use pocketmine\Player;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use Ghezin\cp\Core;
use Ghezin\cp\tasks\onetime\RestartTask;

class StopCommand extends PluginCommand{
	
	private $plugin;
	
	public function __construct(Core $plugin){
		parent::__construct("stop", $plugin);
		$this->plugin=$plugin;
		$this->setPermission("cp.command.stop");
	}
	public function execute(CommandSender $player, string $commandLabel, array $args){
		if(!$player->hasPermission("cp.command.stop")){
			$player->sendMessage("§cYou cannot execute this command.");
			return;
		}
		$this->plugin->getServer()->broadcastMessage("§bColossus will now preform a restart.");
		$this->plugin->getScheduler()->scheduleDelayedRepeatingTask(new RestartTask($this->plugin), 60, 1);
	}
}