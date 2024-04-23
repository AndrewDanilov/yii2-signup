<?php
namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Password reset form
 */
class PasswordResetForm extends Model
{
    const SCENARIO_UPDATE = 'update';

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $password;

    /**
     * @var \common\models\User
     */
    private $_user;

    public function formName(): string
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['token', 'validateToken', 'skipOnEmpty' => false, 'except' => self::SCENARIO_UPDATE],
            ['password', 'required', 'on' => self::SCENARIO_UPDATE, 'message' => 'Пароль не может быть пустым.'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength'], 'on' => self::SCENARIO_UPDATE, 'tooShort' => 'Минимальная длина пароля ' . Yii::$app->params['user.passwordMinLength'] . ' символов.'],
        ];
    }

    public function validateToken($attribute)
    {
        if (empty($this->token) || !is_string($this->token)) {
            $this->addError($attribute, 'Токен для сброса пароля не может быть пустым.');
        }
        $this->_user = User::findByPasswordResetToken($this->token);
        if (!$this->_user) {
            $this->addError($attribute, 'Некорректный токен для сброса пароля.');
        }
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        // todo: this needs to be changed depends on your password realization
        // i.e.: $user->password = $this->password;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        $user->generateAuthKey();

        return $user->save(false);
    }
}
