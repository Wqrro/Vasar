<?php

declare(strict_types=1);

namespace Ghezin\cp\Commands;

use pocketmine\Player;
use pocketmine\entity\Skin;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\PlayerListPacket;
use pocketmine\network\mcpe\protocol\types\PlayerListEntry;
use pocketmine\network\mcpe\protocol\types\SkinData;
use pocketmine\network\mcpe\protocol\types\SkinAdapterSingleton;
use Ghezin\cp\Core;
use Ghezin\cp\CPlayer;
use Ghezin\cp\Utils;

class DisguiseCommand extends PluginCommand{
	
	private $plugin;
	
	public function __construct(Core $plugin){
		parent::__construct("disguise", $plugin);
		$this->plugin=$plugin;
		$this->setPermission("cp.command.disguise");
		$this->setAliases(["disg"]);
	}
	public function execute(CommandSender $player, string $commandLabel, array $args){
		if(!$player instanceof Player){
			return;
		}
		if(!$player->hasPermission("cp.command.disguise")){
			$player->sendMessage("§cYou cannot execute this command.");
			return;
		}
		if(!$player->isOp()){
			if($player->isTagged()){
				$player->sendMessage("§cYou cannot use this command while in combat.");
				return;
			}
		}
		if(!isset($args[0])){
			if($player->isDisguised()){
				$player->setDisguised(false);
			}
			$names=Utils::getFakeNames();
			$randname=$names[array_rand($names)];
			foreach($this->plugin->getServer()->getOnlinePlayers() as $online){
				if(Utils::getPlayerDisplayName($online)==$randname or Utils::getPlayerName($online)==$randname){
					$player->sendMessage("§cDisguise failed, name already in use.");
					return;
				}
			}
			$player->setDisguised(true);
			$player->sendMessage("§aYou have been disguised as ".$randname."!");
			$player->setDisplayName($randname);
			foreach($this->plugin->getServer()->getOnlinePlayers() as $online){
				$entry=new PlayerListEntry();
				$entry->uuid=$player->getUniqueId();
				$packet=new PlayerListPacket();
				$packet->entries[]=$entry;
				$packet->type=PlayerListPacket::TYPE_REMOVE;
				$online->sendDataPacket($packet);
				$packet2=new PlayerListPacket();
				$packet2->type=PlayerListPacket::TYPE_ADD;
				$packet2->entries[]=PlayerListEntry::createAdditionEntry($player->getUniqueId(), $player->getId(), $player->getDisplayName(), SkinAdapterSingleton::get()->toSkinData($player->getSkin()), "");
				$online->sendDataPacket($packet2);
				$message=$this->plugin->getStaffUtils()->sendStaffNoti("disguiseon");
				$message=str_replace("{name}", $player->getName(), $message);
				$message=str_replace("{disguise}", $randname, $message);
				if($online->hasPermission("cp.staff.notifications")){
					$online->sendMessage($message);
				}
			}
		}
		if(isset($args[0])){
			switch($args[0]){
				case "off":
				if(!$player->isDisguised()){
					$player->sendMessage("§cYou are not in disguise.");
					return;
				}
				$before=$player->getDisplayName();
				$player->setDisguised(false);
				$player->setDisplayName($player->getName());
				$packet=new PlayerListPacket();
				$packet->type=PlayerListPacket::TYPE_ADD;
				$packet->entries[]=PlayerListEntry::createAdditionEntry($player->getUniqueId(), $player->getId(), $player->getDisplayName(), SkinAdapterSingleton::get()->toSkinData($player->getSkin()), $player->getXuid());
				foreach($this->plugin->getServer()->getOnlinePlayers() as $online){
					$online->sendDataPacket($packet);
					$message=$this->plugin->getStaffUtils()->sendStaffNoti("disguiseoff");
					$message=str_replace("{name}", $player->getName(), $message);
					$message=str_replace("{disguise}", $before, $message);
					if($online->hasPermission("cp.staff.notifications")){
						$online->sendMessage($message);
					}
				}
				$player->sendMessage("§aDisguise disabled.");
				break;
				default:
				$player->sendMessage("§cYou must provide a valid argument: off");
			}
		}
	}
}