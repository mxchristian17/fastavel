<?php

declare(strict_types=1);

namespace Models\User;

use Models\DbQuery\{DbQuery};

class User
{
    protected $fillable = ['Name', 'Surname', 'Username', 'Mail', 'Password'];
    
    /*public function __construct(?int $id = null, ?string $name = null)
    {
        global $mysqli;
        global $useUsers;

        $this->id = $useUsers ? $id : 0;
        $this->name = $useUsers ? $name : '';
    
    }
    */
    
}
