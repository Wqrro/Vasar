<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks;

use pocketmine\scheduler\Task;
use Ghezin\cp\Core;

class BroadcastTask extends Task{
	
	public function __construct(Core $plugin){
		$this->plugin=$plugin;
		$this->line=-1;
	}
	public function onRun(int $tick):void{
		$cast=[
		$this->plugin->getCastPrefix()."Join our official discord at ".$this->plugin->getDiscord().".",
		$this->plugin->getCastPrefix()."Check out our twitter, ".$this->plugin->getTwitter().".",
		$this->plugin->getCastPrefix()."Buy a rank for access to exlusive features at ".$this->plugin->getStore()."."
		];
		$this->line++;
		$msg=$cast[$this->line];
		foreach($this->plugin->getServer()->getOnlinePlayers() as $online){
			$online->sendMessage($msg);
		}
		if($this->line===count($cast) - 1) $this->line = -1;
	}
}