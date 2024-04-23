<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;

class EmailVerificationForm extends Model
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['token', 'validateToken', 'skipOnEmpty' => false],
        ];
    }

    public function validateToken($attribute)
    {
        if (empty($this->token) || !is_string($this->token)) {
            $this->addError($attribute, 'Токен верификации не может быть пустым.');
        }
        $this->_user = User::findByVerificationToken($this->token);
        if (!$this->_user) {
            $this->addError($attribute, 'Некорректный токен верификации.');
        }
    }

    /**
     * Verify email
     *
     * @return User|null the saved model or null if saving fails
     */
    public function verifyEmail(): ?User
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $user->setTrialTariff();
        return $user->save(false) ? $user : null;
    }
}
