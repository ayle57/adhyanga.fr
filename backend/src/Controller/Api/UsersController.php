<?php

namespace App\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class UsersController extends AbstractController{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    #[Route('/api/users', name: 'api.users')]
    public function showAll(SerializerInterface $serializer): JsonResponse
    {
        $users = $this->userRepository->findAll();
        $data = $serializer->serialize($users, 'json', ['groups' => ['user:read']]);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/users/{id}', name: 'api.users.show')]
    public function showOne(int $id, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->userRepository->find($id);
        $data = $serializer->serialize($user, 'json', ['groups' => ['user:details']]);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/users/{id}/contacts', name: 'api.users.contacts')]
    public function getContacts(int $id, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->userRepository->find($id);
        $data = $serializer->serialize($user->getContacts(), 'json', ['groups' => ['contact:read']]);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/users/{id}/appointments', name: 'api.users.appointments')]
    public function getAppointments(int $id, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->userRepository->find($id);
        $data = $serializer->serialize($user->getAppointments(), 'json', ['groups' => ['appointment:read']]);

        return new JsonResponse($data, 200, [], true);
    }
}
