<?php

namespace Templates\Main\components\Auth;

use Framework\CUser;
use Exception;

class Ajax extends CUser
{
    /**
     * @throws Exception
     */
    public function runAction()
   {
       $action = $this->data['action']."Action";
       $this->checkAction($action);
       $this->data['password'] = $this->hashPassword($this->data['password']);
       $updateData = $this->insertDataArray($this->data);
       $response = $this->$action($updateData);

       return $response;
   }

   private function createAction(array $payload): string
   {
       return self::create($payload);
   }

    /**
     * @throws Exception
     */
    private function checkAction($action): void
   {
       if(!method_exists(self::class,$action)) {
           throw new Exception("Action not found");
       }
   }
}
