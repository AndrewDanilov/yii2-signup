<?php
namespace frontend\controllers;

use frontend\models\EmailVerificationForm;
use frontend\models\EmailVerificationRequestForm;
use frontend\models\PasswordResetForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Контроллер для регистрации, активации аккаунта, восстановления пароля.
 */
class SignupController extends Controller
{
    /**
     * Страница регистрации аккаунта
     *
     * @return Response|string
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['signup/signup-done']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Страница сообщения об успешной регистрации аккаунта
     *
     * @return string
     */
    public function actionSignupDone(): string
    {
        return $this->render('signup-done');
    }

    /**
     * Страница запроса на сброс пароля
     *
     * @return Response|string
     */
    public function actionPasswordResetRequest()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                return $this->redirect(['signup/password-reset-requested']);
            }

            $model->addError('email', 'Извините, мы не можем отправить письмо для указанного e-mail.');
        }

        return $this->render('password-reset-request', [
            'model' => $model,
        ]);
    }

    /**
     * Страница сообщения об успешной отправке сообщения для сброса пароля
     *
     * @return string
     */
    public function actionPasswordResetRequested(): string
    {
        return $this->render('password-reset-requested');
    }

    /**
     * Восстановление пароля
     *
     * @param string $token
     * @return Response|string
     */
    public function actionPasswordReset(string $token)
    {
        $model = new PasswordResetForm();
        $model->token = $token;

        if (!$model->validate()) {
            return $this->render('password-reset-token-error', [
                'model' => $model,
            ]);
        }

        if (Yii::$app->request->isPost) {
            $model->scenario = PasswordResetForm::SCENARIO_UPDATE;

            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                return $this->redirect(['signup/password-reset-done']);
            }
        }

        return $this->render('password-reset', [
            'model' => $model,
        ]);
    }

    /**
     * Страница сообщения об успешном восстановлении пароля
     *
     * @return string
     */
    public function actionPasswordResetDone(): string
    {
        return $this->render('password-reset-done');
    }

    /**
     * Страница запроса повторной отправки письма для подтверждения аккаунта
     *
     * @return Response|string
     */
    public function actionEmailVerificationRequest()
    {
        $model = new EmailVerificationRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                return $this->redirect(['signup/email-verification-requested']);
            }
            $model->addError('email', 'Извините, мы не можем отправить письмо на этот адрес.');
        }

        return $this->render('email-verification-request', [
            'model' => $model
        ]);
    }

    /**
     * Страница сообщения об успешной повторной отправке письма для подтверждения аккаунта
     *
     * @return string
     */
    public function actionEmailVerificationRequested(): string
    {
        return $this->render('email-verification-requested');
    }

    /**
     * Верификация аккаунта
     *
     * @param string|null $token
     * @return Response|string
     */
    public function actionEmailVerification(string $token)
    {
        $model = new EmailVerificationForm();
        $model->token = $token;

        if (!$model->validate()) {
            return $this->render('email-verification-token-error', [
                'model' => $model,
            ]);
        }

        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            return $this->redirect(['signup/email-verification-done']);
        }

        return $this->render('email-verification-error');
    }

    /**
     * Страница сообщения об успешной верификации аккаунта
     *
     * @return string
     */
    public function actionEmailVerificationDone(): string
    {
    	return $this->render('email-verification-done');
    }
}
