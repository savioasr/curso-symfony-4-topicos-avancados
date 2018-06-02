<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Filesystem;

use Symfony\Component\Translation\TranslatorInterface;

use App\Service\Mensagem;

use Psr\Log\LoggerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'name' => 'Gilson'
        ]);
    }

    /**
     * @Route("/pegar-sessao")
     */
    public function pegarSessao(SessionInterface $session)
    {
        echo $session->get('frase');
        exit;
    }

    /**
     * @Route("/escrever-mensagem")
     */
    public function escreverMensagem(Mensagem $mensagem)
    {
        $mensagem = $this->get('mensagem');

        echo $mensagem->escreverMensagem('Sávio');
        exit;
    }

    /**
     * @Route("/enviar-email")
     * @param \Swift_Mailer $mailer
     */
    public function email(\Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Symfony 4'))
            ->setFrom('noreplay@email.com')
            ->setTo(['savioasrodrigues@gmail.com' => 'Sávio'])
            ->setBody('<h1>Teste de E-mail</h1>', 'text/html');

        $mailer->send($message);

        return new Response('Enviado!');
    }

    /**
     * @Route("/logger")
     */
    public function logger(LoggerInterface $logger)
    {
        $logger->info('Somente uma informação');
        $logger->error('Deu erro em algo');
        $logger->critical('Critico', [
            'motivo' => 'Erro no sistema'
        ]);

        return new Response('Logger executado');
    }

    /**
     * @Route("/filesystem")
     */
    public function filesystem()
    {
        $fs = new filesystem();
        $dir = $this->getParameter('kernel.project_dir');
        $fs->mkdir($dir . "/var/teste");

        return new Response('Filesystem');
    }

    /**
     * @Route("/translate")
     */
    public function translate(TranslatorInterface $translator)
    {
        echo $translator->trans("Hello man!");

        echo $translator->trans("Hello %name%!", ['%name%' => 'Sávio']);

        return new Response('translate');
    }
}
