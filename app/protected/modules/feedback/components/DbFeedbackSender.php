<?php

use yupe\components\Mail;

/**
 * Class DbFeedbackSender
 */
class DbFeedbackSender implements IFeedbackSender
{
    /**
     * @var Mail
     */
    protected $mail;

    /**
     * @var FeedbackModule
     */
    protected $module;

    /**
     * DbFeedbackSender constructor.
     * @param Mail $mail
     * @param FeedbackModule $module
     */
    public function __construct(Mail $mail, FeedbackModule $module)
    {
        $this->mail = $mail;

        $this->module = $module;
    }

    /**
     * @param IFeedbackForm $form
     * @return bool
     */
    public function send(IFeedbackForm $form)
    {
        $feedback = new FeedBack();

        echo $form->getAttach();

        $feedback->setAttributes(
            [
                'name' => $form->getName(),
                'email' => $form->getEmail(),
                'theme' => $form->getTheme(),
                'text' => $form->getText(),
                'phone' => $form->getPhone(),
                'type' => $form->getType(),
                'city' => $form->getCity(),
                'attach' => 'test.jpg',// $form->getAttach(),
            ]
        );

        if ($feedback->save()) {

            if ($this->module->sendConfirmation) {
                $this->sendConfirmation($form, $feedback);
            }

            $this->sendAdminEmail($form, $feedback);

            return true;
        }

        return false;
    }

    /**
     * @param IFeedbackForm $form
     * @param FeedBack|null $feedBack
     * @return bool
     */
    public function sendConfirmation(IFeedbackForm $form, FeedBack $feedBack = null)
    {
        $emailBody = Yii::app()->getController()->renderPartial(
            'feedbackConfirmationEmail',
            ['model' => $feedBack],
            true
        );

        return $this->mail->send(
            $this->module->notifyEmailFrom,
            $form->getEmail(),
            Yii::t(
                'FeedbackModule.feedback',
                'Your proposition on site "{site}" was received',
                ['{site}' => Yii::app()->getModule('yupe')->siteName]
            ),
            $emailBody
        );

        return $result;
    }

    /**
     * @param IFeedbackForm $form
     * @param FeedBack|null $feedBack
     * @return bool
     */
    public function sendAdminEmail(IFeedbackForm $form, FeedBack $feedBack = null)
    {
        $emailBody = Yii::app()->getController()->renderPartial(
            'feedbackEmail',
            ['model' => $feedBack],
            true
        );


        foreach (explode(',', $this->module->emails) as $email) {
            $this->mail->send(
                $this->module->notifyEmailFrom,
                $email,
                $form->getTheme(),
                $emailBody,
                false,
                [$form->getEmail() => $form->getName()]
            );
        }
        return true;

    }
}
