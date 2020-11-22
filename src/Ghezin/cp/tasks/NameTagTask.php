<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks;

use pocketmine\scheduler\Task;
use Ghezin\cp\Core;
use Ghezin\cp\CPlayer;
use Ghezin\cp\Utils;

class NameTagTask extends Task{
	
	public function __construct(Core $plugin){
		$this->plugin=$plugin;
	}
	public function onRun(int $tick):void{
		foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
			if($player instanceof CPlayer){
				$rank=$player->getRank();
			}else{
				$rank=$this->plugin->getDatabaseHandler()->getRank(Utils::getPlayerName($player));
			}
			$health=round($player->getHealth(), 1);
			if($this->plugin->getDuelHandler()->getDuel($player)===null and $this->plugin->getDuelHandler()->getPartyDuel($player)===null){
				$format=Utils::getNameTagFormat($rank);
				$format=str_replace("{name}", Utils::getPlayerDisplayName($player), $format);
				$format=str_replace("{hp}", $health, $format);
				if(!$player->isDisguised()){
					if(!$player->isVanished()){
						$player->setNameTag($format);
					}else{
						$player->setNameTag($format." §7(V)");
					}
				}else{
					$default=Utils::getNameTagFormat("Player");
					$default=str_replace("{name}", Utils::getPlayerDisplayName($player), $default);
					$default=str_replace("{hp}", $health, $default);
					$player->setNameTag($default);
				}
			}
		}
	}
}