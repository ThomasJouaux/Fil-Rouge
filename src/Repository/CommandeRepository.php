<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Commande;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class CommandeRepository extends ServiceEntityRepository
{

    private $em;
    public function __construct(ManagerRegistry $registry , EntityManagerInterface $em)
    {
        parent::__construct($registry, Commande::class);
        $this->em = $em;
    }
    
   

    public function findByUser(User $user): ?Commande
    {
        return $this->em->createQueryBuilder('c')
            ->select('c')
            ->from(Commande::class, 'c')
            ->andWhere('c.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();
    }
}