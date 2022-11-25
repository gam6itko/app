<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\User;
use Cycle\Annotated\Annotation as Cycle;

#[Cycle\Entity(table: 'user_email')]
class Email
{
    #[Cycle\Column(type: 'primary')]
    public int $id;

    #[Cycle\Column(type: 'string')]
    public string $value;

    #[Cycle\Relation\BelongsTo(target: User::class)]
    public User $user;

    public function __construct(User $user, string $value)
    {
        $this->user = $user;
        $this->value = $value;
    }
}
