<?php

declare(strict_types=1);

namespace Ghezin\cp\Commands;

use pocketmine\Player;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use Ghezin\cp\Core;

class WhoCommand extends PluginCommand{
	
	private $plugin;
	
	public function __construct(Core $plugin){
		parent::__construct("who", $plugin);
		$this->plugin=$plugin;
		$this->setPermission("cp.command.who");
	}
	public function execute(CommandSender $player, string $commandLabel, array $args){
		if(!$player->hasPermission("cp.command.who")){
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
		$target=$this->plugin->getServer()->getPlayer($args[0]);
		$rank=$target->getRank();
		if($target->isOp()){
			$op="True";
		}else{
			$op="False";
		}
		$displayname=$target->getDisplayName();
		$controls=$this->plugin->getPlayerControls($target);
		$device=$this->plugin->getPlayerDevice($target);
		$os=$this->plugin->getPlayerOs($target);
		$ip=$target->getAddress();
		$ping=$target->getPing();
		$level=$target->getLevel()->getName();
		$xuid=$target->getXuid();
		$uniqueid=$target->getUniqueId();
		$player->sendMessage("§b".$target->getName()."\n§fDisplay Name: ".$displayname."\nRank: ".$rank."\nOP: ".$op."\nDevice: ".$device."\nOS: ".$os."\nControls: ".$controls."\nPing: ".$ping."\nWorld: ".$level."\nXuid: ".$xuid."\nUnique ID: ".$uniqueid);
	}
}