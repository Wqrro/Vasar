<?php

declare(strict_types=1);

namespace Ghezin\cp\duels\groups;

use pocketmine\level\Position;
use pocketmine\Player;
use Ghezin\cp\Core;
use Ghezin\cp\Utils;

class DuelSpectator{
	
	private $name;
	private $boundingBox;

	public function __construct(Player $player){
		$this->name=$player->getName();
		$this->boundingBox=$player->getBoundingBox();
		$player->boundingBox->contract($player->width, 0, $player->height);
	}
	public function teleport(Position $pos):void{
		if($this->isOnline()){
			$p=$this->getPlayer()->getPlayer();
			$pl=$p->getPlayer();
			$pl->teleport($pos);
		}
	}
	public function resetPlayer(bool $disablePlugin=false):void{
		if($this->isOnline()){
			$p=$this->getPlayer()->getPlayer();
			$p->boundingBox=$this->boundingBox;
			Utils::sendPlayer($p, "lobby", true);
		}
	}
	public function getPlayer(){
		return Utils::getPlayer($this->name);
	}
	public function isOnline():bool{
		$p=$this->getPlayer();
		return !is_null($p) and $p->isOnline();
	}
	public function getPlayerName():string{
		return $this->name;
	}
}