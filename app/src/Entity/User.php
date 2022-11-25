<?php

declare(strict_types=1);

namespace App\Entity;

use Cycle\Annotated\Annotation as Cycle;

#[Cycle\Entity(table: 'user')]
class User
{
    #[Cycle\Column(type: 'primary')]
    public int $id;

    #[Cycle\Column(type: 'string')]
    public string $username;

    #[Cycle\Column(type: 'integer')]
    public int $age = 0;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

}
