<?php

declare(strict_types=1);

namespace Ghezin\cp\duels\DuelInvite;

use pocketmine\Player;
use Ghezin\cp\Core;
use Ghezin\cp\CPlayer;
use Ghezin\cp\Utils;

class DuelInvite{
	
	private $plugin;
	private $mode;
	private $sender;
	private $target;
	
	public function __construct(string $mode, string $sender, string $target){
		$this->plugin=Core::getInstance();
		$this->mode=$mode;
		$this->sender=$sender;
		$this->target=$target;
	}
	public function getMode():string{
		return $this->mode;
	}
	public function getSender():string{
		return $this->sender;
	}
	public function getTarget():string{
		return $this->target;
	}
	public function isSenderOnline():bool{
		$player=Server::getInstance()->getPlayerExact($this->sender);
		return $player!==null;
	}
	public function isTargetOnline():bool{
		$player=Server::getInstance()->getPlayerExact($this->target);
		return $player!==null;
	}
	public function accept(){
		if($this->isTargetOnline()){
			$player=Utils::getPlayer($this->target);
			unset($this->plugin->duelInvites[$this]);
		}
	}
	public function decline(){
		unset($this->plugin->duelInvites[$this]);
	}
}