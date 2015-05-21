<?php

namespace MaintenanceMode;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class MaintenanceMode extends PluginBase {
  
  
  public function onEnable() {
    $this->getLogger()->info(TextFormat::GREEN."Enabled and ready to use!");
  }
  
  public function onDisable () {
    $this->getLogger()->info(TextFormat::GREEN."Disabled successfully.");
  }
  
   public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch ($command->getName()) {
            case "maintenance":
                switch (array_shift($args)) {
                    case "on":
                        $sender->sendMessage($this->turnOnMM($sender));
                        return true;
                    case "off":
                        $sender->sendMessage($this->turnOffMM($sender));
                        return true;
                    default:
                        $sender->sendMessage(TextFormat::YELLOW."+-------------------+\n".TextFormat::GREEN."MaintenanceMode\n".TextFormat::RED."/maintenance on\n".TextFormat::GREEN."/maintenance off\n".TextFormat::DARK_RED."- Created by Exxarion\n".TextFormat::YELLOW."+-------------------+");
                        return true;
                        
                }
            default:
                return false;
        }
    }
    
    public function turnOnMM($sender) {
      $sender->sendMessage(TextFormat::RED."[MM] Enabling Maintenance Mode...");
            foreach($sender->getServer()->getOnlinePlayers() as $everybody) {
              foreach(!($everybody->isOP()) as $nonOps) {
              $nonOps->kick("$message");
              //TODO: Prevent Non-OPS from connecting
            }
              
    }
    
    public function turnOffMM($sender) {
      //TODO: Finish this

}

?>
