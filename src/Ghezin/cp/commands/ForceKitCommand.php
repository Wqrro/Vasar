<?php

declare(strict_types=1);

namespace Ghezin\cp\Commands;

use pocketmine\Player;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use Ghezin\cp\Core;
use Ghezin\cp\Kits;

class ForceKitCommand extends PluginCommand{
	
	private $plugin;
	
	public function __construct(Core $plugin){
		parent::__construct("forcekit", $plugin);
		$this->plugin=$plugin;
		$this->setPermission("cp.command.forcerank");
	}
	public function execute(CommandSender $player, string $commandLabel, array $args){
		if(!$player->hasPermission("cp.command.forcekit")){
			$player->sendMessage("§cYou cannot execute this command.");
			return;
		}
		if(!isset($args[0])){
			$player->sendMessage("§cYou must provide a player.");
			return;
		}
		if($this->plugin->getServer()->getPlayer($args[0])===null){
			$player->sendMessage("§cPlayer not found.");
			return;
		}
		if(!isset($args[1])){
			$player->sendMessage("§cProvide a kit. (LOWERCASE)");
			$player->sendMessage("§c- NoDebuff");
			$player->sendMessage("§c- Gapple");
			$player->sendMessage("§c- OPGapple");
			$player->sendMessage("§c- Combo");
			$player->sendMessage("§c- Fist");
			return;
		}
		$target=$this->plugin->getServer()->getPlayer($args[0]);
		$kit=$args[1];
		$player->sendMessage("§a".$target->getName()." was given the ".$kit." kit.");
		Kits::sendKit($target, $kit);
	}
}