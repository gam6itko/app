<?php

declare(strict_types=1);

namespace App\Api\Web\Controller;

use App\Api\Job\Ping;
use App\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Exception;
use Spiral\Prototype\Traits\PrototypeTrait;
use Spiral\Queue\QueueInterface;

class HomeController
{
    /**
     * Read more about Prototyping:
     * @link https://spiral.dev/docs/basics-prototype/#installation
     */
    use PrototypeTrait;

    public function __construct(
        private readonly QueueInterface $queue,
    ) {
    }

    public function index(): string
    {
        return $this->views->render('home.dark.php');
    }

    /**
     * Example of exception page.
     */
    public function exception(): never
    {
        throw new Exception('This is a test exception.');
    }

    public function ping(): string
    {
        $jobID = $this->queue->push(Ping::class, [
            'value' => 'hello world',
        ]);

        return sprintf('Job ID: %s', $jobID);
    }

    public function issue1(ORMInterface $orm): array
    {
        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        if (!$user) {
            $user = new User('noname');
            (new EntityManager($orm))->persist($user)->run();
        }

        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        $user->age++;

        $em = (new EntityManager($orm));
        $em->persist($user);

        $i = 1;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;

        $em->run();

        $db = $orm->getSource(User::class)->getDatabase();
        return [
            'alias' => $db->select('value')->from('user_alias')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'email' => $db->select('value')->from('user_email')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'phone' => $db->select('value')->from('user_phone')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
        ];
    }

    public function issue2(ORMInterface $orm): array
    {
        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        if (!$user) {
            $user = new User('noname');
            (new EntityManager($orm))->persist($user)->run();
        }

        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        $user->age++;

        $em = (new EntityManager($orm));
        $em->persist($user);

        $i = 1;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;

        $em->run();

        $db = $orm->getSource(User::class)->getDatabase();
        return [
            'alias' => $db->select('value')->from('user_alias')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'email' => $db->select('value')->from('user_email')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'phone' => $db->select('value')->from('user_phone')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
        ];
    }

    public function issue3(ORMInterface $orm): array
    {
        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        if (!$user) {
            $user = new User('noname');
            (new EntityManager($orm))->persist($user)->run();
        }

        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        $user->age++;

        $em = (new EntityManager($orm));
        $em->persist($user);

        $i = 1;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;

        $em->run();

        $db = $orm->getSource(User::class)->getDatabase();
        return [
            'alias' => $db->select('value')->from('user_alias')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'email' => $db->select('value')->from('user_email')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'phone' => $db->select('value')->from('user_phone')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
        ];
    }

    public function no_issue1(ORMInterface $orm): array
    {
        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        if (!$user) {
            $user = new User('noname');
            (new EntityManager($orm))->persist($user)->run();
        }

        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        $user->age++;

        $em = (new EntityManager($orm));
        $em->persist($user);

        $i = 1;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;

        $em->run();

        $db = $orm->getSource(User::class)->getDatabase();
        return [
            'alias' => $db->select('value')->from('user_alias')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'email' => $db->select('value')->from('user_email')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'phone' => $db->select('value')->from('user_phone')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
        ];
    }

    public function no_issue2(ORMInterface $orm): array
    {
        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        if (!$user) {
            $user = new User('noname');
            (new EntityManager($orm))->persist($user)->run();
        }

        $user = $orm->getRepository(User::class)->findOne(['username' => 'noname']);
        $user->age++;

        $em = (new EntityManager($orm));
        $em->persist($user);

        $i = 1;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Alias($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Email($user, "{$user->age}-$i")) and $i++;

        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;
        $em->persist(new User\Phone($user, "{$user->age}-$i")) and $i++;

        $em->run();

        $db = $orm->getSource(User::class)->getDatabase();
        return [
            'alias' => $db->select('value')->from('user_alias')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'email' => $db->select('value')->from('user_email')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
            'phone' => $db->select('value')->from('user_phone')->where('value', 'LIKE', "%{$user->age}%")->fetchAll(),
        ];
    }
}
