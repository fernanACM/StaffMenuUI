<?php 

namespace FlynnKunz\StaffMenuUI;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\player\GameMode;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use FlynnKunz\StaffMenuUI\FormsUI\SimpleForm;
# PluginUtils by fernanACM
use FlynnKunz\StaffMenuUI\utils\PluginUtils;

class Main extends PluginBase{

	public function onEnable(): void{
		$this->getServer()->getLogger()->info("StaffMenuUI enabled");
	}

	public function onCommand(CommandSender $sender, Command $commmand, string $label, array $args): bool{
		switch ($commmand->getName()){
			case "staffmenu":
			    if($sender instanceof Player){
			    	$this->StaffMenuUI($sender);
                           PluginUtils::PlaySound($sender, "random.chestopen", 1, 1);
			    }else{
			    	$this->sendMessage("Use this command in-game");
			    	return true;
			    }
			break;
		}
		return true;
	}

	public function StaffMenuUI(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.gamemode")){
					    $this->Gamemode($player);
                    PluginUtils::PlaySound($player, "random.chestopen", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
                  if($player->hasPermission("staffmenuui.vanish")){
         $this->getServer()->getCommandMap()->dispatch($player, "vanish");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 2:
                  if($player->hasPermission("staffmenuui.nickname")){
         $this->getServer()->getCommandMap()->dispatch($player, "nick");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 3:
                  if($player->hasPermission("staffmenuui.staffchat")){
         $this->getServer()->getCommandMap()->dispatch($player, "simplestaffchat");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 4:
                  if($player->hasPermission("staffmenuui.kick")){
         $this->getServer()->getCommandMap()->dispatch($player, "kick");
$player->sendMessage("Type /kick {player_name} to kick player");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 5:
                  if($player->hasPermission("staffmenuui.ban")){
         $this->getServer()->getCommandMap()->dispatch($player, "tban");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 6: 
if($player->hasPermission("staffmenuui.mute")){
         $this->Mute($player)
                    PluginUtils::PlaySound($player, "random.chestopen", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 7:
if($player->hasPermission("staffmenuui.freeze")){
         $this->Freeze($player)
                 PluginUtils::PlaySound($player, "random.chestopen", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 8:
if($player->hasPermission("staffmenuui.invsee")){
       $this->InvSee($player)
PluginUtils::PlaySound($player, "random.chestopen", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
     case 9:
if($player->hasPermission("staffmenuui.teleport")){
       $this->getServer()->getCommandMap()->dispatch($player, "tp");
PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
     break;
					case 10:
					break;
				}
			}
		});
		$form->setTitle("StaffMenu");
  $form->setContent("Select StaffMenu Category");
		$form->addButton("Gamemode");
  $form->addButton("Vanish");
  $form->addButton("Change Nick");
  $form->addButton("Staff Chat");
  $form->addButton("Kick Player");
  $form->addButton("Ban Player");
  $form->addButton("Mute");
  $form->addButton("Freeze");
  $form->addButton("See Inventory");
  $form->addButton("Teleport");
		$form->addButton("Exit");
		$player->sendForm($form);
	}

 public function Gamemode(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.gamemode-survival")){
       $player->setGamemode(GameMode::SURVIVAL());
                    $player->sendMessage("Your game mode has been changed to Survival");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
if($player->hasPermission("staffmenuui.gamemode-creative")){
$player->setGamemode(GameMode::CREATIVE());
                    $player->sendMessage("Your game mode has been changed to Creative");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
     case 2:
if($player->hasPermission("staffmenuui.gamemode-adventure")){
$player->setGamemode(GameMode::ADVENTURE());
                    $player->sendMessage("Your game mode has been changed to Adventure");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
     case 3:
if($player->hasPermission("staffmenuui.gamemode-spectator")){
      $player->setGamemode(GameMode::SPECTATOR());
                    $player->sendMessage("Your game mode has been changed to Spectator");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					case 4:
					    $this->StaffMenuUI($player);
					break;
				}
			}
		});
		$form->setTitle("Gamemode Menu");
  $form->setContent("Select Gamemode Category");
		$form->addButton("Survival");
  $form->addButton("Creative");
  $form->addButton("Adventure");
  $form->addButton("Spectator");
		$form->addButton("Back");
		$player->sendForm($form);
 }

 public function Mute(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.mute-player")){
       $this->MutePlayer($player)
                    PluginUtils::PlaySound($player, "random.chestopen", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
if($player->hasPermission("staffmenuui.mute-all")){
$this->getServer()->getCommandMap()->dispatch($player, "muteall");
                    $player->sendMessage("Your game mode has been changed to Creative");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
					case 2:
					    $this->StaffMenuUI($player);
					break;
				}
			}
		});
		$form->setTitle("Mute Menu");
  $form->setContent("Select Mute Category");
		$form->addButton("Mute Player");
  $form->addButton("Mute All");
		$form->addButton("Back");
		$player->sendForm($form);
 }

 public function MutePlayer(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.mute-mute")){
       $this->getServer()->getCommandMap()->dispatch($player, "mute");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
if($player->hasPermission("staffmenuui.mute-unmute")){
$this->getServer()->getCommandMap()->dispatch($player, "unmute");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
     case 2:
if($player->hasPermission("staffmenuui.mute-editmute")){
       $this->getServer()->getCommandMap()->dispatch($player, "editmute");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
     case 3:
if($player->hasPermission("staffmenuui.mute-muteinfo")){
      $this->getServer()->getCommandMap()->dispatch($player, "muteinfo");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission This Commands");
                  }
					case 4:
					    $this->Mute($player);
					break;
				}
			}
		});
		$form->setTitle("Mute Menu");
  $form->setContent("Select Mute Category");
		$form->addButton("Mute");
  $form->addButton("Unmute");
  $form->addButton("Edit Mute");
  $form->addButton("Info Mute");
		$form->addButton("Back");
		$player->sendForm($form);
 }

 public function Freeze(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.freeze-freeze")){
       $this->getServer()->getCommandMap()->dispatch($player, "freeze");
                    $player->sendMessage(" Type /freeze {player_name} to freeze");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
if($player->hasPermission("staffmenuui.freeze-unfreeze")){
$this->getServer()->getCommandMap()->dispatch($player, "unfreeze");
$this->sendMessage("Type /unfreeze {player_name} to unfreeze");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
					case 2:
					    $this->StaffMenuUI($player);
					break;
				}
			}
		});
		$form->setTitle("Freeze Menu");
  $form->setContent("Select Freeze Category");
		$form->addButton("Freeze");
  $form->addButton("Un Freeze");
		$form->addButton("Back");
		$player->sendForm($form);
 }

 public function InvSee(Player $player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data !== null){
				switch($data){
					case 0:
                  if($player->hasPermission("staffmenuui.invsee-invsee")){
       $this->getServer()->getCommandMap()->dispatch($player, "invsee");
                    $player->sendMessage(" Type /invsee {player_name} to see");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
					break;
     case 1:
if($player->hasPermission("staffmenuui.invsee-enderinvsee")){
$this->getServer()->getCommandMap()->dispatch($player, "enderinvsee");
$this->sendMessage("Type /enderinvsee {player_name} to see");
                    PluginUtils::PlaySound($player, "random.pop", 1, 1);
                  } else {
                    $player->sendMessage("You Dont Have Permission To Use This Commands");
                  }
    break;
					case 2:
					    $this->StaffMenuUI($player);
					break;
				}
			}
		});
		$form->setTitle("InvSee Menu");
  $form->setContent("Select InvSee Category");
		$form->addButton("See Inventory");
  $form->addButton("See Ender Chest Inventory");
		$form->addButton("Back");
		$player->sendForm($form);
	}
}
