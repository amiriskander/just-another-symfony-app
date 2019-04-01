<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuthorController
 *
 * @package App\Controller
 *
 * @Route("/author")
 */
class AuthorController extends AbstractController
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AuthorController constructor.
     *
     * @param AuthorRepository $authorRepository
     */
    public function __construct(AuthorRepository $authorRepository, EntityManagerInterface $entityManager)
    {
        $this->authorRepository = $authorRepository;
        $this->entityManager    = $entityManager;
    }

    /**
     * @Route("/", name="author_list")
     */
    public function list()
    {
        return $this->render('author/list.html.twig', ['authors' => $this->authorRepository->findAll()]);
    }

    /**
     * @Route("/create", name="author_create")
     */
    public function create(Request $request)
    {
        // just setup a fresh $author object (remove the dummy data)
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$author` variable has also been updated
            $author = $form->getData();
            $this->entityManager->persist($author);
            $this->entityManager->flush();

            return $this->redirectToRoute('author_list');
        }

        return $this->render('author/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
