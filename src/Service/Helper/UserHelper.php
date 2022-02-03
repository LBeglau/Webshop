<?php

namespace App\Service\Helper;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserHelper
{
    private $userRepo;
    private $em;
    private String $salt;
    /**
     * @var User
     */
    private $user;

    public function __construct(EntityManagerInterface $em, UserRepository $userRepository, User $user)
    {
        $this->userRepo = $userRepository;
        $this->em = $em;
        $this->user = $user;
        $this->salt = "mikeHash";
    }

    public function validateUsername($input): ?bool{

        // Variablen Initialisieren ( Für Validierung )
        $validatingName = $input->getUsername();
        $musters = "/[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz._-]/";

        // Jede Art von erlaubten Zeichen mit allen Zeichen, jedesmal hochzählen wenn eins Stimmt
        $addingMatches = preg_match_all($musters, $validatingName, $matches[][], PREG_PATTERN_ORDER, 0);

        //dump($addingMatches);
        // Hochgezählte Menge sollt identisch zu der count-Menge des "Username" sein
        // Sofern alle Zeichen der erlaubten Zeichen entsprechen.
        if($addingMatches === count(str_split($validatingName))){
            $notExists = $this->userRepo->findBy([
                'username' => $validatingName
            ]);
            if(empty($notExists)){
                return true;
            }else{
                return null;
            }
        }else{
            return false;
        }
    }

    public function setNewUser(User $parameter): User{
        $this->user->setEmail($parameter->getEmail());
        $this->user->setName($parameter->getName());
        $this->user->setPassword($parameter->getPassword());
        $this->user->setPhonenum($parameter->getPhoneNum());
        $this->user->setRoles(['ROLE_USER']);

        return $this->user;
    }

    public function saveUserDb(User $input){
        dump($input);
        $this->em->persist($input);
        $this->em->flush();
        return true;
    }

    public function getUserbyID($id){
        $user = $this->userRepo->findBy([
            'id'=>$id
        ]);
        return $user;
    }

    public function getAllUser(){
        $users = $this->userRepo->findAll();
        return $users;
    }

}