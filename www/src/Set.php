<?php

namespace Higherror\RelokiaTestProject;

class Set
{

    function  __construct($array)
    {
        $this->File();
        $this->setToFile($array);
    }

    function File()
    {
        $this->file = $file = fopen('openMe.csv', 'w+');

        $csv_array = ["Ticket ID", "Description", "Status", "Priority", "Agent ID", "Agent Name", "Agent Email",
            "Contact ID", "Contact Name", "Contact Email", "Group ID", "Group Name", "Company ID", "Company Name", "Comments"];

        fputcsv($this->file, $csv_array);
    }

   function  setToFile($arr)
   {
       foreach ($arr as $value) {


           $ticket = new Ticket($value);

           $csv_array = [
               $ticket->getId(),
               $ticket->getDescription(),
               $ticket->getStatus(),
               $ticket->getPriority(),
               $ticket->getAgent()->getId(),
               $ticket->getAgent()->getName(),
               $ticket->getAgent()->getEmail(),
               $ticket->getContact()->getId(),
               $ticket->getContact()->getName(),
               $ticket->getContact()->getEmail(),
               $ticket->getGroup()->getId(),
               $ticket->getGroup()->getName(),
               $ticket->getCompany()->getId(),
               $ticket->getCompany()->getName(),
               $ticket->getCommentsString()
           ];


           fputcsv($this->file, $csv_array);
       }
   }
}