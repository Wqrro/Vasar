<?php

declare(strict_types=1);

namespace Ghezin\cp\handlers;

use pocketmine\Player;
use pocketmine\Server;
use Ghezin\cp\Core;
use Ghezin\cp\Utils;

class PermissionHandler{
	
	private $plugin;

	public function __construct(){
		$this->plugin=Core::getInstance();
	}
	public function addPermission(Player $player, string $rank){
		switch($rank){
			case "Player":
			return;
			break;
			case "Voter":
			/*$existing=Utils::getPerms($player->getName());
			$permissions=["cp.command.fly"];
			Utils::clearPerms($player->getName());
			foreach($permissions as $perm){
				Utils::setPerms($player->getName(), $perm);
			}*/
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "Elite":
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "Premium":
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "Booster":
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "YouTube":
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "Famous":
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.fly", true);
			break;
			case "Builder":
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.gm", true);
			$player->addAttachment($this->plugin, "cp.can.build", true);
			$player->addAttachment($this->plugin, "cp.can.break", true);/*
			$player->addAttachment($this->plugin, "bt.cmd.help", true);
			$player->addAttachment($this->plugin, "bt.cmd.pos1", true);
			$player->addAttachment($this->plugin, "bt.cmd.pos2", true);
			$player->addAttachment($this->plugin, "bt.cmd.fill", true);
			$player->addAttachment($this->plugin, "bt.cmd.wand", true);
			$player->addAttachment($this->plugin, "bt.cmd.sphere", true);
			$player->addAttachment($this->plugin, "bt.cmd.cube", true);
			$player->addAttachment($this->plugin, "bt.cmd.draw", true);
			$player->addAttachment($this->plugin, "bt.cmd.copy", true);
			$player->addAttachment($this->plugin, "bt.cmd.paste", true);
			$player->addAttachment($this->plugin, "bt.cmd.merge", true);
			$player->addAttachment($this->plugin, "bt.cmd.rotate", true);
			$player->addAttachment($this->plugin, "bt.cmd.flip", true);
			$player->addAttachment($this->plugin, "bt.cmd.undo", true);
			$player->addAttachment($this->plugin, "bt.cmd.fix", true);
			$player->addAttachment($this->plugin, "bt.cmd.tree", true);
			$player->addAttachment($this->plugin, "bt.cmd.naturalize", true);
			$player->addAttachment($this->plugin, "bt.cmd.id", true);
			$player->addAttachment($this->plugin, "bt.cmd.clearinventory", true);
			$player->addAttachment($this->plugin, "bt.cmd.blockinfo", true);
			$player->addAttachment($this->plugin, "bt.cmd.hsphere", true);
			$player->addAttachment($this->plugin, "bt.cmd.hcube", true);
			$player->addAttachment($this->plugin, "bt.cmd.schematic", true);
			$player->addAttachment($this->plugin, "bt.cmd.cylinder", true);
			$player->addAttachment($this->plugin, "bt.cmd.hcylinder", true);
			$player->addAttachment($this->plugin, "bt.cmd.pyramid", true);
			$player->addAttachment($this->plugin, "bt.cmd.hpyramid", true);
			$player->addAttachment($this->plugin, "bt.cmd.stack", true);
			$player->addAttachment($this->plugin, "bt.cmd.outline", true);
			$player->addAttachment($this->plugin, "bt.cmd.move", true);
			$player->addAttachment($this->plugin, "bt.cmd.schematic", true);*/
			break;
			case "Trainee":
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			break;
			case "Helper":
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.who", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			$player->addAttachment($this->plugin, "cp.command.alias", true);
			$player->addAttachment($this->plugin, "pocketmine.command.teleport", true);
			break;
			case "Mod":
			$player->addAttachment($this->plugin, "cp.command.alias", true);
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.online", true);
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.command.who", true);
			$player->addAttachment($this->plugin, "cp.command.gm", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			$player->addAttachment($this->plugin, "pocketmine.command.teleport", true);
			$player->addAttachment($this->plugin, "pocketmine.command.kick", true);
			break;
			case "HeadMod":
			$player->addAttachment($this->plugin, "cp.command.alias", true);
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.online", true);
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.messages", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.online", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.command.who", true);
			$player->addAttachment($this->plugin, "cp.command.gm", true);
			$player->addAttachment($this->plugin, "pocketmine.command.time", true);
			$player->addAttachment($this->plugin, "cp.bypass.vanishsee", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			$player->addAttachment($this->plugin, "pocketmine.command.teleport", true);
			$player->addAttachment($this->plugin, "pocketmine.command.kick", true);
			break;
			case "Admin":
			$player->addAttachment($this->plugin, "cp.command.alias", true);
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.online", true);
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.messages", true);
			$player->addAttachment($this->plugin, "cp.command.who", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.command.gm", true);
			$player->addAttachment($this->plugin, "cp.command.gmother", true);
			$player->addAttachment($this->plugin, "cp.command.rank", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.bypass.vanishsee", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			$player->addAttachment($this->plugin, "cp.staff.notifications", true);
			$player->addAttachment($this->plugin, "cp.bypass.chatcooldown", true);
			$player->addAttachment($this->plugin, "cp.bypass.chatsilence", true);
			$player->addAttachment($this->plugin, "cp.bypass.combatcommand", true);
			$player->addAttachment($this->plugin, "pocketmine.command.teleport", true);
			$player->addAttachment($this->plugin, "pocketmine.command.give", true);
			$player->addAttachment($this->plugin, "pocketmine.command.kick", true);
			$player->addAttachment($this->plugin, "pocketmine.command.ban", true);
			$player->addAttachment($this->plugin, "pocketmine.command.pardon", true);
			$player->addAttachment($this->plugin, "pocketmine.command.time", true);
			break;
			case "Manager":
			$player->addAttachment($this->plugin, "cp.command.mutechat", true);
			$player->addAttachment($this->plugin, "cp.command.alias", true);
			$player->addAttachment($this->plugin, "cp.command.staff", true);
			$player->addAttachment($this->plugin, "cp.access.staffchat", true);
			$player->addAttachment($this->plugin, "cp.command.online", true);
			$player->addAttachment($this->plugin, "cp.command.disguise", true);
			$player->addAttachment($this->plugin, "cp.command.messages", true);
			$player->addAttachment($this->plugin, "cp.command.who", true);
			$player->addAttachment($this->plugin, "cp.command.announce", true);
			$player->addAttachment($this->plugin, "cp.command.pban", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.mute", true);
			$player->addAttachment($this->plugin, "cp.command.coords", true);
			$player->addAttachment($this->plugin, "cp.command.freeze", true);
			$player->addAttachment($this->plugin, "cp.command.gm", true);
			$player->addAttachment($this->plugin, "cp.command.gmother", true);
			$player->addAttachment($this->plugin, "cp.command.rank", true);
			$player->addAttachment($this->plugin, "cp.command.tban", true);
			$player->addAttachment($this->plugin, "cp.command.vanish", true);
			$player->addAttachment($this->plugin, "cp.bypass.vanishsee", true);
			$player->addAttachment($this->plugin, "cp.staff.cheatalerts", true);
			$player->addAttachment($this->plugin, "cp.staff.notifications", true);
			$player->addAttachment($this->plugin, "cp.bypass.chatcooldown", true);
			$player->addAttachment($this->plugin, "cp.bypass.chatsilence", true);
			$player->addAttachment($this->plugin, "cp.bypass.combatcommand", true);
			$player->addAttachment($this->plugin, "pocketmine.command.teleport", true);
			$player->addAttachment($this->plugin, "pocketmine.command.give", true);
			$player->addAttachment($this->plugin, "pocketmine.command.kick", true);
			$player->addAttachment($this->plugin, "pocketmine.command.ban", true);
			$player->addAttachment($this->plugin, "pocketmine.command.pardon", true);
			$player->addAttachment($this->plugin, "pocketmine.command.time", true);
			break;
			case "Owner":
			return;
			break;
			case "Founder":
			return;
			break;
		}
	}
}