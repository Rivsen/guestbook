<?php

namespace Rswork\GuestbookBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Rswork\GuestbookBundle\Entity\Comment;
use Rswork\GuestbookBundle\Form\CommentType;

use Rswork\GuestbookBundle\Entity\Message;
use Rswork\GuestbookBundle\Form\MessageType;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{

    protected $message = null;

    /**
     * Get Message object using message id defined in routing.
     *
     */
    public function getMessage( $message_id )
    {
        if( $this->message == null ) {

            $em = $this->getDoctrine()->getManager();

            $this->message = $em->getRepository('RsworkGuestbookBundle:Message')->find($message_id);

            if (!$this->message) {
                throw $this->createNotFoundException("Unable to find Message with message id: {$message_id}.");
            }

        }

        return $this->message;
    }

    /**
     * Creates a new Comment entity.
     *
     */
    public function createAction($message_id, Request $request)
    {
        $message = $this->getMessage( $message_id );
        $entity  = new Comment( $message );
        $form = $this->createForm(new CommentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('guestbook_show', array('id' => $message_id)));
        }

        return $this->render('RsworkGuestbookBundle:Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Delete a Comment entity.
     */
    public function deleteAction(Request $request, $id, $message_id)
    {
        $message = $this->getMessage( $message_id );
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RsworkGuestbookBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('guestbook_show', array('id' => $message_id)));
    }
}
